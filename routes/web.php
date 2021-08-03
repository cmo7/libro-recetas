<?php

use App\Models\Ingrediente;
use Illuminate\Support\Facades\Route;
use App\Models\Receta;
use App\Models\User;
use Illuminate\Http\Request;


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

Route::get('/', function () {
    return view('portada',[
        "todaslasrecetas" => Receta::all(), //mostrar todas las recetas en la portada
    ]);
});

Route::get('/dashboard', function () {
    return redirect('/');    //Con este cambio nos envía a la portada
})->middleware(['auth'])->name('dashboard');

/*Ruta para ver una receta*/
Route::get('receta/{id}', function ($id) {
    return view('receta', [
        "receta" => Receta::findOrFail($id),
    ]);
});

/*Ruta para ver usuario*/
Route::get('user/{id}', function ($id) {
    return view('user', [
        "user" => User::findOrFail($id),
    ]);
});

/* Ruta para formulario de ingredientes */
Route::get('/ingrediente_nuevo', function () {
    return view('formulario-ingrediente');
});

/* Ruta para formulario de ingredientes */
Route::post('/ingrediente_nuevo', function (Request $request) {
    $validatedata = $request->validate(["nombre"=>"required"]);
    Ingrediente::create($validatedata);
    return redirect('/');
});

/* Ruta para formulario de recetas */
Route::get('/receta_nueva', function () {
    return view('formulario-receta');
});

/* Ruta para formulario de ingredientes */
Route::post('/receta_nueva', function (Request $request) {
    $validatedata = $request->validate([
        "nombre" => "required|string",
        "tiempo" => "required",
        "comensales" => "required|numeric|min:1",
        "dificultad" => "required|string",
        "proceso" => "required",
        "extracto" => "required",
    ]);
    $validatedata['user_id'] = auth()->user()->id;
    $imagenreceta = time() . "." . $request->imagen->extension();

    $request->imagen->move(public_path('img'),$imagenreceta);
    $validatedata['imagen'] = "/img/$imagenreceta";
    Receta::create($validatedata);
    return redirect('/');
});

require __DIR__.'/auth.php';


