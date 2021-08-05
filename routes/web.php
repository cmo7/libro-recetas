<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\PortadaController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [PortadaController::class, 'show']);

Route::get('/dashboard', function () {
    return redirect('/');    //Con este cambio nos envía a la portada
})->middleware(['auth'])->name('dashboard');

Route::get('receta/{id}', [RecetaController::class, 'show']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::get('/ingrediente_nuevo', [IngredienteController::class, 'create'])->middleware(['auth']);
Route::post('/ingrediente_nuevo', [IngredienteController::class, 'store'])->middleware(['auth']);
Route::get('/receta_nueva', [RecetaController::class, 'create'])->middleware(['auth']);
Route::post('/receta_nueva', [RecetaController::class, 'store'])->middleware(['auth']);
Route::post('/borrar_receta', [RecetaController::class, 'destroy'])->middleware(['auth']);
Route::post('/comentario_nuevo', [ComentarioController::class, 'store'])->middleware(['auth']);

require __DIR__.'/auth.php';
