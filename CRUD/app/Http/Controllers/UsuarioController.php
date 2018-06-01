<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(5);

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

    public function detalhes($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.formulario', ['usuario' => $usuario]);
    }

    public function editar($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios/formulario');
    }

    public function search(Request $request)
    {
        $dataForm = $request->all();

//        $hist = User->where( function($query) use ($dataForm) {
//            if (isset($dataForm['name']))
//                $query->where('name', $dataForm['name']);
//            if (isset($dataForm['email']))
//                $query->where('email', $dataForm['email']);
//            if (isset($dataForm['cpf']))
//                $query->where('cpf', $dataForm['cpf']);
//        })->toSql();
//        dd($hist);


    }


}
