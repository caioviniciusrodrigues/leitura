<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
   /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    /**
       * Write code on Method
       *
       * @return response()
       */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            //'email' => 'required|email|exists:users',
            'email' => 'required|email|exists:users',
        ]);

        $token = md5(now());

        DB::table('password_resets')->insert([
            //'email' => $request->email,
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('SAED - Redefinição de Senha');
        });

        //return back()->with('message', 'We have e-mailed your password reset link!');
        return back()->with('success', 'Enviamos um link para redefinir sua senha!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token) {

        $email = DB::select('select * from password_resets where token = ?', [$token]);

        return view('auth.forgetPasswordLink', ['token' => $token, 'email' => $email[0]->email]);

    }

    /**
       * Write code on Method
       *
       * @return response()
       */
    public function submitResetPasswordForm(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email,
                            'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('user.login')->with('success' , 'Sua senha foi alterada com sucesso!');

    }

}
