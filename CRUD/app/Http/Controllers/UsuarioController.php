<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    //numero de usuarias por pagina
    private $totalPage = 5;

    public function index()
    {

        $usuarios = User::where('activate','=','1');
        $usuarios = $usuarios->paginate($this->totalPage);

        return view('usuarios.lista', ['usuarios' => $usuarios]);
    }

    public function novo()
    {
        return view('usuarios.formulario');
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
        $usuarios = User::where('activate', '=', '1');

        //pesquisa pelo nome
        if ($request->name != null) {
            $usuarios = $usuarios->where('name','like','%'.$request->name.'%');
        }

        //pesquisa pelo email
        if ($request->email != null) {
            $usuarios = $usuarios->where('email','like','%'.$request->email.'%');
        }

        //pesquisa pelo cpf
        if ($request->cpf != null ) {
            $usuarios = $usuarios->where('cpf','like','%'.$request->cpf.'%');
        }

        //paginacao
        $usuarios = $usuarios->paginate($this->totalPage);

        return view('usuarios.lista', ['usuarios' => $usuarios]);

    }


}
