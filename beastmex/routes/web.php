<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\administradorController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\almacenController;
use App\Http\Controllers\ventasController;

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
/* metodoLogin */
Route::get('/', [loginController::class,'metodoLogin']);
Route::get('/cambiarContraseña', [loginController::class,'metodoCamContra']);

/* administrador */
Route::get('/administrador',  [administradorController::class,'metodoAdministrador']);

/* metodoAlmacen */
Route::get('/almacen', [almacenController::class,'metodoAlmacen']);
Route::get('/editarAlmacen', [almacenController::class,'metodoEditAlmacen']);
Route::get('/agregarProducto', [almacenController::class,'metodoAgregarAlmacen']);

/* metodoUsuarios */
Route::get('/usuarios', [usuariosController::class,'metodoUsuarios']);
/*Route::get('/usuarios', [usuariosController::class,'metodoAgregarUsuarios']);  
Route::get('/usuarios', [usuariosController::class,'metodoEditUsuarios']);*/

/* metodoVentas */
Route::get('/ventas', [ventasController::class,'metodoVentas']);
Route::get('/registarVentas', [ventasController::class,'metodoAgregarVentas']);
Route::get('/editarVentas', [ventasController::class,'metodoEditVentas']);