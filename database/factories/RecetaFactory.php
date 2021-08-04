<?php

namespace Database\Factories;

use App\Models\Receta;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'nombre' => $this->faker->sentence(),
            'tiempo' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'comensales' => random_int(1,8),
            'dificultad' => $this->faker->randomElement(['Fácil', 'Media', 'Difícil']),
            'proceso' => $this->faker->realText(),
            'extracto' => $this->faker->sentence(),
            'imagen' => "https://lorempixel.com/400/200/food/",
            'user_id' => random_int(1,User::all()->count()),
        ];
    }
}
