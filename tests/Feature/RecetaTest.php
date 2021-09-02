<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class RecetaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_el_formulario_de_nueva_receta_es_visible_al_estar_logeado()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/receta_nueva');

        $response->assertStatus(200);
    }

    public function test_el_formulario_de_nueva_receta_redirige_a_raiz_al_no_estar_logeado()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_se_pueden_crear_nuevas_recetas() {

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/receta_nueva', [
            'nombre' => 'Arroz a la cubana',
            'tiempo' => '1:00:00',
            'comensales' => 4,
            'dificultad' => 'Media',
            'proceso' => 'blablabla',
            'extracto' => 'extracto blabla',
            'imagen' => UploadedFile::fake()->image('arroz.jpg'),
        ]);

        $this->assertDatabaseHas('recetas', [
            'nombre' => 'Arroz a la cubana'
        ]);
    }
}
