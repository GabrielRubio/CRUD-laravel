<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    public function index()
    {

        $usuarios = User::where('activate','=','1');
        $usuarios = $usuarios->paginate(5);

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

    public function atualizar($id, Request $request)
    {
        $button = $request->button;
        $activate = $request->activate;

        //Buscando o usuario no banco de dados
        $usuario = User::findOrFail($id);


        if ($button == 'Editar'){ //caso seja requisitado edicao
            $usuario->update($request->all());

            \Session::flash('mensagem_sucesso', 'Usuário atualizado com sucesso!');

        }else{
            if($activate == '1'){ //caso seja requisitado desativacao
                $usuario->update(['activate'=>'0']);
                \Session::flash('mensagem_sucesso', 'Usuário desativado com sucesso!');
            }else{ //caso seja requisitado ativacao
                $usuario->update(['activate'=>'1']);
                \Session::flash('mensagem_sucesso', 'Usuário ativado com sucesso!');
            }

        }

        return Redirect::to('usuarios/'.$usuario->id.'/detalhes');
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
