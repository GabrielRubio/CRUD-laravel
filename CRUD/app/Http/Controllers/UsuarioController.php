<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::get();

        return view('usuarios.lista', ['usuarios' => $usuarios]);
    }

    public function novo()
    {
        return view('usuarios.formulario');
    }

    public function salvar(Request $request)
    {
        $usuario = new User();

        $usuario = $usuario->create($request->all());


        \Session::flash('mensagem_sucesso', 'Usuário cadastrado com sucesso!');

        return Redirect::to('usuarios/novo');

    }


}
