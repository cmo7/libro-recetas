<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingrediente;
use App\Models\Receta;
use App\Models\User;

class PortadaController extends Controller
{
    public function show(Request $request)
    {
        //filtro para mínimo y máximo
        $minimo = 1;
        $maximo = 100;
        if ($request['minimo']) {
            $minimo = $request['minimo'];
        }
        if ($request['maximo']) {
            $maximo = $request['maximo'];
        }

        $todaslasrecetas = Receta::where('comensales', ">=", $minimo)
            ->where('comensales', '<=', $maximo)
            ->get();

        //filtro para dificultad
        $dificultad = $request['dificultad'];

        if ($dificultad) {
            $todaslasrecetas = $todaslasrecetas->filter(function ($value, $key) use ($dificultad) {
                return $value->dificultad == $dificultad;
            });
        }

        return view('portada', [
            //"todaslasrecetas" => Receta::all()->sortDesc(), //mostrar todas las recetas en la portada
            "todaslasrecetas" => $todaslasrecetas,
            "ingredientes" => Ingrediente::all(), //mostrar todos los ingredientes en el OffCanvas
            "autores" => User::all(), //mostrar todos los autores en el OffCanvas
        ]);
    }
}
