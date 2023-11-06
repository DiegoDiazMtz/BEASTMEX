<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cambiarContraseña', function () {
    return view('cambiarContraseña');
});
Route::get('/administrador', function () {
    return view('administrador');
});
Route::get('/almacen', function () {
    return view('almacen/almacen');
});
Route::get('/editarAlmacen', function () {
    return view('almacen/editar');
});
Route::get('/usuarios', function () {
    return view('usuarios/usuarios');
});

Route::get('/compras', function () {
    return view('compras/compras');
});

Route::get('/ordenes', function () {
    return view('compras/ordenes');
});

Route::get('/consulta', function () {
    return view('compras/consulta');
});