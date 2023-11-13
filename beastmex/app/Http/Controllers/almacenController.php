<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class almacenController extends Controller
{
    public function metodoAlmacen(){
        return view('almacen/almacen');
    }

    public function metodoEditAlmacen(){
        return view('almacen/editar');
    }

    public function metodoAgregarAlmacen(){
        return view('almacen/agregar');
    }
}
