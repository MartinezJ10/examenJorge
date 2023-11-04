<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DirectorioController;

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
Route::get('/enlistar', [DirectorioController::class,'index'])->name('directorio.index');

Route::get('/nuevo', [DirectorioController::class,'nuevo'])->name('directorio.nuevo');
Route::post('/guardar', [DirectorioController::class,'guardar'])->name('directorio.guardar');

Route::get('/buscarVista', [DirectorioController::class,'buscarVista'])->name('directorio.buscarVista');
Route::post('/buscar', [DirectorioController::class,'buscar'])->name('directorio.buscar');

Route::get('/ver/{correo}', [DirectorioController::class,'ver'])->name('directorio.ver');

Route::get('/eliminar/{id}', [DirectorioController::class,'eliminar'])->name('directorio.eliminar');

Route::get('/nuevoContacto/{codigoEntrada}', [ContactoController::class,'nuevo'])->name('contacto.new');

Route::post('/guardarContacto', [ContactoController::class,'guardar'])->name('contacto.guardar');

Route::get('/eliminarContacto/{id}', [ContactoController::class,'eliminar'])->name('contacto.eliminar');

