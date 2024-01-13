<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\TiemposController;
use App\Http\Controllers\Bebidas_IventarioController;
use App\Http\Controllers\Productos_IventarioController;
use App\Http\Controllers\Rellenos_IventarioController;
use App\Http\Controllers\Masas_IventarioController;
use App\Http\Controllers\PlatilloController;
<<<<<<< HEAD
use App\Http\Controllers\VentasController;
=======
use App\Http\Controllers\VentaController;
use App\Http\Controllers\venta_prueba;

>>>>>>> dee61fcc842fd365d308971cca2dd6450b868a18





Route::view('/', 'home')->name('home');
Route::view('/inventario', 'inventario')->name('inventario');
<<<<<<< HEAD
//route::view('/venta','venta.venta')->name('venta');
=======
//Route::view('/venta','venta.venta')->name('venta');
>>>>>>> dee61fcc842fd365d308971cca2dd6450b868a18
Route::view('/Historial', 'Historial')->name('Historial');
//ventas

<<<<<<< HEAD
Route::get('/venta', 'App\Http\Controllers\VentasController@index')->name('venta.index');
Route::post('/venta', 'App\Http\Controllers\VentasController@store')->name('venta.store');
Route::post('/venta', 'App\Http\Controllers\VentasController@validateForm')->name('venta.validateForm');

=======
>>>>>>> dee61fcc842fd365d308971cca2dd6450b868a18

//PERSONAL
Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');
Route::get('/personal/crear', [PersonalController::class, 'create'])->name('personal.create');
Route::get('/personal/{persona}/edit', [PersonalController::class, 'edit'])->name('personal.edit');
Route::patch('/personal/{persona}', [PersonalController::class, 'update'])->name('personal.update');
Route::post('/personal', [PersonalController::class, 'store'])->name('personal.store');
Route::get('/personal/{persona}', [PersonalController::class, 'show'])->name('personal.show');
Route::delete('/personal/{persona}', [PersonalController::class, 'destroy'])->name('personal.destroy');


//CHECADOR
Route::get('checador', [TiemposController::class, 'index'])->name('checador.index');
Route::get('/checador/create', [TiemposController::class, 'create'])->name('checador.create');
Route::post('/checador', [TiemposController::class, 'store'])->name('checador.store');
Route::get('checador/create_salida', [TiemposController::class, 'createSalida'])->name('checador.create_salida');
Route::post('checador/salida', [TiemposController::class, 'storeSalida'])->name('checador.storeSalida');

//BEBIDAS

Route::get('bebidas_inevetario.index', [Bebidas_IventarioController::class, 'index'])->name('bebidas_inevetario.index');
Route::get('/bebidas_inevetario/create', [Bebidas_IventarioController::class, 'create'])->name('bebidas_inevetario.create');
Route::post('bebidas_inevetario', [Bebidas_IventarioController::class, 'store'])->name('bebidas_inevetario.store');
Route::get('/bebidas_inevetario/{id}/edit', [Bebidas_IventarioController::class, 'edit'])->name('bebidas_inevetario.edit');
Route::put('/bebidas_inevetario/{id}', [Bebidas_IventarioController::class, 'update'])->name('bebidas_inevetario.update');
Route::delete('/bebidas_inevetario/{id}', [Bebidas_IventarioController::class, 'destroy'])->name('bebidas_inevetario.destroy');
//PRODUCTO O SUMINISTROS

Route::get('productos_inevetario.index', [Productos_IventarioController::class, 'index'])->name('productos_inevetario.index');
Route::get('/productos_inevetario/create', [Productos_IventarioController::class, 'create'])->name('productos_inevetario.create');
Route::post('productos_inevetario', [Productos_IventarioController::class, 'store'])->name('productos_inevetario.store');
Route::get('/productos_inevetario/{id}/edit', [Productos_IventarioController::class, 'edit'])->name('productos_inevetario.edit');
Route::put('/productos_inevetario/{id}', [Productos_IventarioController::class, 'update'])->name('productos_inevetario.update');
Route::delete('/productos_inevetario/{id}', [Productos_IventarioController::class, 'destroy'])->name('productos_inevetario.destroy');
Route::delete('/productos_inevetario/{id}', [Productos_IventarioController::class, 'destroy'])->name('productos_inevetario.destroy');


//RELLENOS

Route::get('rellenos_inevetario.index', [Rellenos_IventarioController::class, 'index'])->name('rellenos_inevetario.index');

Route::get('/rellenos_inevetario/create', [Rellenos_IventarioController::class, 'create'])->name('rellenos_inevetario.create');
Route::post('rellenos_inevetario', [Rellenos_IventarioController::class, 'store'])->name('rellenos_inevetario.store');
Route::get('/rellenos_inevetario/{id}/edit', [Rellenos_IventarioController::class, 'edit'])->name('rellenos_inevetario.edit');
Route::put('/rellenos_inevetario/{id}', [Rellenos_IventarioController::class, 'update'])->name('rellenos_inevetario.update');
Route::delete('/rellenos_inevetario/{id}', [Rellenos_IventarioController::class, 'destroy'])->name('rellenos_inevetario.destroy');


//MASAS


Route::get('masas_inevetario.index', [Masas_IventarioController::class, 'index'])->name('masas_inevetario.index');
Route::get('/masas_inevetario/create', [Masas_IventarioController::class, 'create'])->name('masas_inevetario.create');
Route::post('masas_inevetario', [Masas_IventarioController::class, 'store'])->name('masas_inevetario.store');
Route::get('/masas_inevetario/{id}/edit', [Masas_IventarioController::class, 'edit'])->name('masas_inevetario.edit');
Route::put('/masas_inevetario/{id}', [Masas_IventarioController::class, 'update'])->name('masas_inevetario.update');
Route::delete('/masas_inevetario/{id}', [Masas_IventarioController::class, 'destroy'])->name('masas_inevetario.destroy');
Route::delete('/masas_inevetario/{id}', [Masas_IventarioController::class, 'destroy'])->name('masas_inevetario.destroy');

//PLATILLOS.

Route::get('/platillos', [PlatilloController::class, 'index'])->name('platillos.index');
Route::get('/platillos/create', [PlatilloController::class, 'create'])->name('platillos.create');
Route::post('/platillos', [PlatilloController::class, 'store'])->name('platillos.store');
Route::get('/platillos/{id}', [PlatilloController::class, 'show'])->name('platillos.show');
Route::get('/platillos/{id}/edit', [PlatilloController::class, 'edit'])->name('platillos.edit');
Route::put('/platillos/{id}', [PlatilloController::class, 'update'])->name('platillos.update');
Route::delete('/platillos/{id}', [PlatilloController::class, 'destroy'])->name('platillos.destroy');

<<<<<<< HEAD
=======
//ventas
//Route::get('/venta', [venta_prueba::class, 'index'])->name('venta.venta');
Route::get('/venta/venta', [venta_prueba::class, 'index'])->name('venta.venta');
>>>>>>> dee61fcc842fd365d308971cca2dd6450b868a18
