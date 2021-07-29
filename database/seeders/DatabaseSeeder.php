<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Receta::factory(50)->create();
        \App\Models\Ingrediente::factory(200)->create();
        \App\Models\IngredienteReceta::factory(1000)->create();
    }
}
