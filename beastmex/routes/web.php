<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\administradorController;
use App\Http\Controllers\almacenController;
use App\Http\Controllers\comprasController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\ventasController;

/* metodoLogin --------------------------------------------------------------------------*/
Route::get('/', [loginController::class,'index']) -> name('login.index');
Route::post('/login', [loginController::class,'login']) -> name('login.login');
Route::get('/cambiarContraseña', [loginController::class,'edit']) -> name('login.edit');


/* administrador --------------------------------------------------------------------------*/
Route::get('/administrador',  [administradorController::class,'index']) -> name('administrador.index') /* -> middleware('checkrole:admin') */;


/* metodoAlmacen --------------------------------------------------------------------------*/
Route::get('/almacen', [almacenController::class,'index']) -> name('almacen.index');
Route::get('/editarProducto/{id}', [almacenController::class,'edit'])->name('almacen.edit');
Route::put('/actualizarProducto/{id}', [almacenController::class,'update'])->name('almacen.update');
Route::get('/formProducto', [almacenController::class,'create']) -> name('almacen.create');
Route::post('/agregarProducto', [almacenController::class,'store']) -> name('almacen.store');
Route::post('/filtrarProducto', [almacenController::class,'filtro']) -> name('almacen.filtro');
Route::post('/eliminarProducto{id}', [almacenController::class,'destroy']) -> name('almacen.destroy');
Route::get('/imprimir-lista-productos', [almacenController::class, 'imprimirListaProductos'])->name('imprimir.lista.productos');


/* metodoUsuarios --------------------------------------------------------------------------*/
Route::get('/usuarios', [usuariosController::class,'index']) -> name('usuarios.index');
/*Route::get('/usuarios', [usuariosController::class,'metodoAgregarUsuarios']);  
Route::get('/usuarios', [usuariosController::class,'metodoEditUsuarios']);*/


/* metodoVentas --------------------------------------------------------------------------*/
Route::get('/ventas', [ventasController::class,'index']) -> name('ventas.index');
Route::get('/agregarVenta', [ventasController::class,'create']) -> name('ventas.create');
Route::get('/editarVentas', [ventasController::class,'edit']) -> name('ventas.edit');


/* metodoCompras --------------------------------------------------------------------------*/
Route::get('/compras', [comprasController::class,'index']) -> name('compras.index');
Route::get('/agregarCompra', [comprasController::class,'create']) -> name('compras.create');
Route::get('/agregarOrden', [comprasController::class,'createOrden']) -> name('compras.createOrden');
