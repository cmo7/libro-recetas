<?php

namespace Database\Factories;

use App\Models\Ingrediente;
use App\Models\IngredienteReceta;
use App\Models\Receta;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredienteRecetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IngredienteReceta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "receta_id" => random_int(1, Receta::all()->count() - 1),
            "ingrediente_id" => random_int(1, Ingrediente::all()->count() - 1),
            "cantidad" => random_int(1, 1000) . " gramos"
        ];
    }
}
