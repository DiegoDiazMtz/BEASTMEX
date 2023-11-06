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
Route::get('/agregarProducto', function () {
    return view('almacen/agregar');
});
Route::get('/usuarios', function () {
    return view('usuarios/usuarios');
});
Route::get('/ventas', function () {
    return view('ventas/ventas');
});
Route::get('/registarVentas', function () {
    return view('ventas/registrar');
});
Route::get('/editarVentas', function () {
    return view('ventas/editar');
});



