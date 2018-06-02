<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{

    /**
     * Variable to set how many users per page.
     *
     * @var integer
     */
    private $totalPage = 5;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application users's list.
     *
     * @return view \users\list
     */
    public function list()
    {

        $users = User::where('activate','=','1');
        $users = $users->paginate($this->totalPage);

        return view('users.list', ['users' => $users]);
    }

    /**
     * Show the application user's details.
     *
     * @param $id user's id
     * @return view \users\details
     */
    public function details($id)
    {
        $user = User::findOrFail($id);

        return view('users.formulario', ['user' => $user]);
    }


    /**
     * Update user's details.
     *
     * @param $id user's id
     * @param $request
     * @return redirect list/{id}/details
     */
    public function update($id, Request $request)
    {
        $button = $request->button;
        $activate = $request->activate;

        //searching user in DB
        $user = User::findOrFail($id);


        if ($button == 'Editar'){   //if editing is necessary
            $user->update($request->all());

            \Session::flash('mensagem_sucesso', 'Usuário atualizado com sucesso!');

        }else{
            if($activate == '1'){   //if requested to deactivate
                $user->update(['activate'=>'0']);
                \Session::flash('mensagem_sucesso', 'Usuário desativado com sucesso!');
            }else{                  //if requested to activate
                $user->update(['activate'=>'1']);
                \Session::flash('mensagem_sucesso', 'Usuário ativado com sucesso!');
            }

        }

        return Redirect::to('list/'.$user->id.'/details');
    }

    /**
     * Search users in database.
     *
     * @param $request
     * @return view users/list
     */
    public function search(Request $request)
    {
        $users = User::where('activate', '=', '1');

        //search by name
        if ($request->name != null) {
            $users = $users->where('name','like','%'.$request->name.'%');
        }

        //search by email
        if ($request->email != null) {
            $users = $users->where('email','like','%'.$request->email.'%');
        }

        //search by cpf
        if ($request->cpf != null ) {
            $users = $users->where('cpf','like','%'.$request->cpf.'%');
        }

        //pagination
        $users = $users->paginate($this->totalPage);

        return view('users.list', ['users' => $users]);

    }


}
