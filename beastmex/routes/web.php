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
Route::get('/login/salir', [loginController::class,'logout']) -> name('login.logout');
Route::get('/cambiarContraseña', [loginController::class,'edit']) -> name('login.edit');


/* administrador --------------------------------------------------------------------------*/
Route::get('/administrador',  [administradorController::class,'index']) -> name('administrador.index')->middleware('checkrole:Gerente');/* -> middleware('checkrole:admin') */;


/* metodoAlmacen --------------------------------------------------------------------------*/
Route::get('/almacen', [almacenController::class,'index']) -> name('almacen.index')->middleware('checkrole:Gerente,Auxiliar');
Route::get('/almacen/editar/{id}', [almacenController::class,'edit'])->name('almacen.edit')->middleware('checkrole:Gerente,Auxiliar');
Route::put('/almacen/actualizar/{id}', [almacenController::class,'update'])->name('almacen.update')->middleware('checkrole:Gerente,Auxiliar');
Route::get('/almacen/agregar', [almacenController::class,'create']) -> name('almacen.create')->middleware('checkrole:Gerente,Auxiliar');
Route::post('/almacen/guardar', [almacenController::class,'store']) -> name('almacen.store')->middleware('checkrole:Gerente,Auxiliar');
Route::post('/almacen/filtrar', [almacenController::class,'filtro']) -> name('almacen.filtro')->middleware('checkrole:Gerente,Auxiliar');
Route::post('/almacen/eliminar/{id}', [almacenController::class,'destroy']) -> name('almacen.destroy')->middleware('checkrole:Gerente,Auxiliar');
Route::get('/almacen/imprimir', [almacenController::class, 'imprimirListaProductos'])->name('imprimir.lista.productos')->middleware('checkrole:Gerente,Auxiliar');


/* metodoUsuarios --------------------------------------------------------------------------*/
Route::get('/usuarios', [usuariosController::class,'index']) -> name('usuarios.index')->middleware('checkrole:Gerente');
/*Route::get('/usuarios', [usuariosController::class,'metodoAgregarUsuarios']);  
Route::get('/usuarios', [usuariosController::class,'metodoEditUsuarios']);*/


/* metodoVentas --------------------------------------------------------------------------*/
Route::get('/ventas', [ventasController::class,'index']) -> name('ventas.index')->middleware('checkrole:Gerente,Coordinador_Ventas');
Route::get('/agregarVenta', [ventasController::class,'create']) -> name('ventas.create')->middleware('checkrole:Gerente,Coordinador_Ventas');
Route::get('/editarVentas', [ventasController::class,'edit']) -> name('ventas.edit')->middleware('checkrole:Gerente,Coordinador_Ventas');


/* metodoCompras --------------------------------------------------------------------------*/
Route::get('/compras', [comprasController::class,'index']) -> name('compras.index')->middleware('checkrole:Gerente,Coordinador_Compras');
Route::get('/compras/imprimir/{id}', [comprasController::class,'imprimirOrdenCompra']) -> name('compras.imprimirOrdenCompra')->middleware('checkrole:Gerente,Coordinador_Compras');
Route::get('/compras/productos', [comprasController::class,'indexProductos']) -> name('comprasProductos.index')->middleware('checkrole:Gerente,Coordinador_Compras');
Route::get('/compras/agregar', [comprasController::class,'create']) -> name('compras.create')->middleware('checkrole:Gerente,Coordinador_Compras');
Route::post('/compras/guardar', [comprasController::class,'store']) -> name('compras.store')->middleware('checkrole:Gerente,Coordinador_Compras');
Route::post('compras/filtrar/', [comprasController::class,'filtrar'])->name('compras.filtrar')->middleware('checkrole:Gerente,Coordinador_Compras');
Route::get('/compras/editar/{id}', [comprasController::class,'edit'])->name('compras.edit')->middleware('checkrole:Gerente,Coordinador_Compras');
Route::put('/compras/actualizar/{id}', [comprasController::class,'update'])->name('compras.update')->middleware('checkrole:Gerente,Coordinador_Compras');
Route::delete('/compras/eliminar/{id}', [comprasController::class,'destroy'])->name('compras.destroy')->middleware('checkrole:Gerente,Coordinador_Compras');

