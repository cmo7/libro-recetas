<?php

use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\UserController;
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

Route::get('/', function (Request $request) {
    //filtro para mínimo y máximo
    $minimo = 1;
    $maximo = 100;
    if($request['minimo']){
        $minimo = $request['minimo'];
    }
    if($request['maximo']){
        $maximo = $request['maximo'];
    }

    $todaslasrecetas = Receta::where('comensales', ">=", $minimo)
    ->where('comensales', '<=', $maximo)
    ->get();

    //filtro para dificultad
    $dificultad = $request['dificultad'];

    if($dificultad){
        $todaslasrecetas = $todaslasrecetas->filter(function($value, $key) use($dificultad){
            return $value->dificultad == $dificultad;
        });
    }

    return view('portada',[
        //"todaslasrecetas" => Receta::all()->sortDesc(), //mostrar todas las recetas en la portada
        "todaslasrecetas" => $todaslasrecetas,
        "ingredientes" => Ingrediente::all(), //mostrar todos los ingredientes en el OffCanvas
        "autores" => User::all(), //mostrar todos los autores en el OffCanvas
    ]);
});

Route::get('/dashboard', function () {
    return redirect('/');    //Con este cambio nos envía a la portada
})->middleware(['auth'])->name('dashboard');

/*Ruta para ver una receta*/
/*
Route::get('receta/{id}', function ($id) {
    return view('receta', [
        "receta" => Receta::findOrFail($id),
    ]);
});
*/
Route::get('receta/{id}', [RecetaController::class, 'show']);

/*Ruta para ver usuario*/
/*
Route::get('user/{id}', function ($id) {
    return view('user', [
        "user" => User::findOrFail($id),
    ]);
});
*/
Route::get('user/{id}', [UserController::class, 'show']);


/* Ruta para formulario de ingredientes */
/*
Route::get('/ingrediente_nuevo', function () {
    return view('formulario-ingrediente');
});
*/
Route::get('/ingrediente_nuevo', [IngredienteController::class, 'create'])
->middleware(['auth']);


/* Ruta para formulario de ingredientes */
/*
Route::post('/ingrediente_nuevo', function (Request $request) {
    $validatedata = $request->validate(["nombre"=>"required"]);
    Ingrediente::create($validatedata);
    return redirect('/');
});
*/
Route::post('/ingrediente_nuevo', [IngredienteController::class, 'store'])
->middleware(['auth']);


/* Ruta para formulario de recetas */
/*
Route::get('/receta_nueva', function () {
    return view('formulario-receta', [
        "ingredientes" => Ingrediente::all(),
    ]);
});
*/
Route::get('/receta_nueva', [RecetaController::class, 'create'])
->middleware(['auth']);


/* Ruta para formulario de nueva receta */
/*
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

    $receta = Receta::create($validatedata);

    foreach ($request->ingredientes as $ingrediente) {
        IngredienteReceta::create([
            "receta_id" => $receta->id,
            "ingrediente_id" => $ingrediente,
            "cantidad" => "1 gramo"
        ]);
    }
    return redirect('/');
});
*/
Route::post('/receta_nueva', [RecetaController::class, 'store'])
->middleware(['auth']);


/*Ruta para borrar receta de un usuario logueado*/
/*
Route::post('/borrar_receta', function(Request $request) {
    $receta = Receta::findOrFail($request["id"]);
    if($receta->user_id == auth()->user()->id) {
        $receta->delete();
    }
    return redirect('/');
});
*/
Route::post('/borrar_receta', [RecetaController::class, 'destroy'])
->middleware(['auth']);


require __DIR__.'/auth.php';


