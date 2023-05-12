<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Gate::denies('usuario-view')) {
            abort(403, 'Não autorizado');
        }

        $usuarios = User::all();

        return view('admin.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function show( $id )
    {
        if(Gate::denies('usuario-view')) {
            abort(403, 'Não autorizado');
        }

        $usuario = User::find($id);
        $papeis = $usuario->papeis;

        return view('admin.usuarios.show', ['usuario' => $usuario, 'papeis' => $papeis]);
    }

    public function create()
    {
        if(Gate::denies('usuario-create')) {
            abort(403, 'Não autorizado');
        }

        return view('admin.usuarios.create');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $data)
    {
        if(Gate::denies('usuario-create')) {
            abort(403, 'Não autorizado');
        }

        $this->validator($data->only(['name', 'email', 'password','password_confirmation']))->validate();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if($user) {
            $user->adicionaPapel('Usuario');
            return redirect()->route('user.create')->with('success' , 'Usuário criado com sucesso');
        }
    }


    public function edit( $id )
    {
        if(Gate::denies('usuario-edit')) {
            abort(403, 'Não autorizado');
        }

        $usuario = User::find($id);
        return view('admin.usuarios.edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {

        if(Gate::denies('usuario-edit')) {
            abort(403, 'Não autorizado');
        }

        $validacao = Validator::make($request->only(['name','email','password','password_confirmation']), [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email,'.$id]
        ])->validate();

        if($validacao) {

            $usuario = User::find($id);

            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->status = $request->status;

            if($request->password) {
                $usuario->password = Hash::make($request->password);
            }

            $usuario->update();

            return redirect()->route('user.edit', ['id' => $id])->with('success' , 'Usuário alterado com sucesso');
        }

        return redirect()->back()->withErrors("Falha ao editar usuário");

    }

    public function mudarperfil(Request $request, $id)
    {

        if(Gate::denies('perfil-view')) {
            abort(403, 'Não autorizado');
        }

        $validacao = Validator::make($request->only(['name','email']), [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email,'.$id]
        ])->validate();


        if($validacao) {

            $usuario = User::find($id);

            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->status = $request->status;

            if($request->password) {

                $validacao = Validator::make($request->only(['password','password_confirmation']), [
                    'password' => 'required|string|min:8|confirmed',
                    'password_confirmation' => 'required'
                ])->validate();

                $usuario->password = Hash::make($request->password);
            }

            $usuario->update();

            return redirect()->route('meu-perfil')->with('success' , 'Usuário alterado com sucesso');
        }

        return redirect()->back()->withErrors("Falha ao editar usuário");

    }

    public function ativarDesativar( $id )
    {
        if(Gate::denies('usuario-delete')) {
            abort(403, 'Não autorizado');
        }

        $usuario = User::find($id);

        if(!$usuario) {
            return redirect()->back()->withErrors(['Usuário Não Encontrado!']);
        }

        $usuario->status = 1 - $usuario->status;
        $usuario->update();

        //$usuario->delete();

        return response()->json([
            'success' => 'success',
            'message' => 'Usuário Alterado!',
        ]);
    }

}
