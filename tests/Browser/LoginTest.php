<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('email', 'marcelinocb@gmail.com')
                    ->type('name', 'Marce Concepcion')
                    ->type('password', 'mi-password')
                    ->type('password_confirmation', 'mi-password')
                    ->click('button')
                    ->assertPathIs('/')
                    ->screenshot('loged-in.png');
        });
    }
}
