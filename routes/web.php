<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\TiemposController;



Route::view('/', 'home')->name('home');
Route::view('/inventario', 'inventario')->name('inventario');
Route::view('ventas', 'ventas')->name('ventas');
Route::view('/pastes', 'pastes')->name('pastes');

Route::view('/Historial', 'Historial')->name('Historial');

Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');
Route::get('/personal/crear', [PersonalController::class, 'create'])->name('personal.create');
Route::get('/personal/{persona}/edit', [PersonalController::class, 'edit'])->name('personal.edit');
Route::patch('/personal/{persona}', [PersonalController::class, 'update'])->name('personal.update');
Route::post('/personal', [PersonalController::class, 'store'])->name('personal.store');
Route::get('/personal/{persona}', [PersonalController::class, 'show'])->name('personal.show');


Route::delete('/personal/{persona}', [PersonalController::class, 'destroy'])->name('personal.destroy');



Route::get('checador', [TiemposController::class, 'index'])->name('checador.index');
Route::get('/checador/create', [TiemposController::class, 'create'])->name('checador.create');
Route::post('/checador', [TiemposController::class, 'store'])->name('checador.store');
Route::get('checador/create_salida', [TiemposController::class, 'createSalida'])->name('checador.create_salida');
Route::post('checador/salida', [TiemposController::class, 'storeSalida'])->name('checador.storeSalida');
