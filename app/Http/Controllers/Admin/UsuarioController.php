<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Papel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Gate::denies('usuario-view')){
            abort(403,"Não autorizado!");
        }

        $usuarios = User::all();

        return view('admin.usuarios.index',compact('usuarios'));
    }

    public function papel($id)
    {

        if(Gate::denies('usuario-edit')){
            abort(403,"Não autorizado!");
        }


        $usuario = User::find($id);
        $papel = Papel::all();

        return view('admin.usuarios.papel',compact('usuario','papel'));
    }

    public function papelStore(Request $request,$id)
    {

        if(Gate::denies('usuario-edit')){
          abort(403,"Não autorizado!");
        }


        $usuario = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
        $usuario->adicionaPapel($papel);
        return redirect()->back();
    }

    public function papelDestroy($id,$papel_id)
    {

        if(Gate::denies('usuario-edit')){
            abort(403,"Não autorizado!");
        }

        $usuario = User::find($id);
        $papel = Papel::find($papel_id);
        $usuario->removePapel($papel);
        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Gate::denies('usuario-create')){
        abort(403,"Não autorizado!");
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Gate::denies('usuario-create')){
        abort(403,"Não autorizado!");
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Gate::denies('usuario-view')){
            abort(403,"Não autorizado!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(Gate::denies('usuario-edit')){
        abort(403,"Não autorizado!");
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('usuario-edit')){
          abort(403,"Não autorizado!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('usuario-delete')){
          abort(403,"Não autorizado!");
        }
    }

    public function perfil()
    {
        $usuario = Auth::user();

        $papeis = $usuario->papeis;

        return view('perfil', compact('usuario', 'papeis'));
    }


    public function login()
    {
        return view('login');
    }

    public function loginUser(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $login['success'] = true;
            echo json_encode($login);
            return;

        } else {
            $login['success'] = false;
            $login['message'] = 'Os dados informados não conferem!';
            echo json_encode($login);
            return;
        }

    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }

    public function esqueciSenha()
    {
        return view('auth.passwords.email');
    }

}
