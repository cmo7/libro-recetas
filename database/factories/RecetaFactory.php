<?php

namespace Database\Factories;

use App\Models\Receta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nombre" => $this->faker->sentence(),
            "tiempo" => $this->faker->time(),
            "comensales" => random_int(1, 8),
            "dificultad" => $this->faker->randomElement(['Facil', 'Medio', 'Dificil']),
            "proceso" => implode(" ", $this->faker->paragraphs(3)),
            "extracto" => $this->faker->sentence(),
            "imagen" => "https://lorempixel.com/400/200/food/",
            "user_id" => random_int(1, User::all()->count() - 1),
        ];
    }
}
