<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function metodoLogin(){
        return view('welcome');
    }

    public function metodoCamContra(){
        return view('cambiarContraseña');
    }
}
