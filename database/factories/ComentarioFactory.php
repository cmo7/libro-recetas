<?php

namespace Database\Factories;

use App\Models\Comentario;
use App\Models\Receta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => random_int(1,User::all()->count()),
            "receta_id" => random_int(1,Receta::all()->count()),
            "contenido" => $this->faker->realText(400),
            "puntuacion" => random_int(1, 10)
        ];
    }
}
