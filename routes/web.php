<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'inicio'])->name('inicio');

Route::get('/detalle/{id?}', [PagesController::class, 'detalle'])->name('notas.detalle');

Route::get('fotos', [PagesController::class, 'fotos'])->name('foto');

Route::get('noticias', [PagesController::class, 'noticias'])->name('noticias');

Route::get('nosotros/{nombre?}', [PagesController::class, 'nosotros'])->name('nosotros');

Route::post('/', [PagesController::class, 'insertar'])->name('notas.crear');

Route::get('/editar/{id}', [PagesController::class, 'editar'])->name('notas.editar');

Route::put('/editar/{id}', [PagesController::class, 'update'])->name('notas.update');

Route::delete('/eliminar/{id}', [PagesController::class, 'eliminar'])->name('notas.eliminar');
