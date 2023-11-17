<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuariosController extends Controller
{
    public function metodoUsuarios(){
        return view('usuarios/usuarios');
    }

    /* public function metodoAgregarUsuarios(){
        return view('usuarios/agregar');
    }
    public function metodoEditUsuarios(){
        return view('usuarios/editar');
    } */
}
