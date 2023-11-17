<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ventasController extends Controller
{
    public function metodoVentas(){
        return view('ventas/ventas');
    }

    public function metodoEditVentas(){
        return view('ventas/editar');
    }

    public function metodoAgregarVentas(){
        return view('ventas/agregar');
    }
}
