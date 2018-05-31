<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuarios.lista');
    }

    public function novo()
    {
        return view('usuarios.formulario');
    }
}
