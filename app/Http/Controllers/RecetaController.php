<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\IngredienteReceta;
use App\Models\Ingrediente;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formulario-receta', [
            "ingredientes" => Ingrediente::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('receta', [
            "receta" => Receta::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $receta = Receta::findOrFail($request["id"]);
        if($receta->user_id == auth()->user()->id) {
            $receta->delete();
        }
        return redirect('/');
    }
}
