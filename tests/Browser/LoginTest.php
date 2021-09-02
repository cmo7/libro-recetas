<?php

namespace Tests\Browser;

use App\Models\Ingrediente;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\NuevaReceta;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
/*     public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(1920, 1080)
                    ->visit('/register')
                    ->type('email', 'marcelinocb@gmail.com')
                    ->type('name', 'Marce Concepcion')
                    ->type('password', 'mi-password')
                    ->type('password_confirmation', 'mi-password')
                    ->click('button')
                    ->assertPathIs('/')
                    ->screenshot('new_user.png');
        });
    } */

    public function testLogin()
    {
        $user = User::factory()->create([
            'email' => 'fff@gmail.com',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->resize(1920, 1080)
                    ->visit(new Login)
                    ->type('@email', $user->email)
                    ->type('@password', 'password')
                    ->click('@remember_me')
                    ->screenshot('form.png')
                    ->press('@submit')
                    ->assertPathIs('/');
        });
    }

    public function testCreateRecipe() {

        $user = User::factory()->create([
            'email' => 'asdf@gmail.com',
        ]);

        $this->browse(function (Browser $browser) {

            Ingrediente::factory(10)->create();

            $browser->resize(1920, 1080)
                    ->loginAs(User::find(1))
                    ->visit('/receta_nueva')
                    ->type('nombre', 'Arroz a la cubana')
                    ->type('tiempo', '1:00:AM')
                    ->type('comensales', '4')
                    ->select('dificultad', 'Fácil')
                    ->type('extracto', 'El arroz a la cubana es un plato de la cocina española y muy típico en Canarias, de origen español en los tiempos de la Capitanía General de Cuba, ​​​ que consiste en un plato de arroz blanco moldeado, huevo frito con salsa de tomate, y plátano frito')
                    ->type('proceso', '1.- Lo primero que haremos será pelar el plátano y dorarlo en una sartén con un poco de mantequilla. Retiramos y reservamos

                    2.- Por otra parte cocemos el arroz en agua con sal durante 18 minutos. Una vez hecho el arroz lo que haremos será rehogarlo con un poco de aceite de oliva y un ajo para que coja un poco de sabor.

                    3.- Respecto al tomate frito, os paso ahora mismo mi receta de tomate frito casero aunque podéis usar el típico de bote. En mi opinión, si tenéis la oportunidad de hacerlo casero mucho mejor.

                    4.- Freímos los dos huevos en abundante aceite caliente (fritos de verdad, no a la plancha).

                    5.- Emplatamos como hacía mi abuela, con una taza hacemos “la montañita”, así lo llamaba cariñosamente y acompañamos de los dos huevos fritos y el plátano. Cubrimos de tomate frito casero y a comer con un buen trozo de pan.')
                    ->attach('imagen', __DIR__.'/photos/arroz.jpg')
                    ->click('#ingrediente-1')
                    ->click('#ingrediente-3')
                    ->click('#ingrediente-4')
                    ->press('Ingresar')
                    ->screenshot('receta')
                    ->assertPathIs('/')
                    ->pause(50000);
        });
    }
}
