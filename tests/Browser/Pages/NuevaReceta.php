<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class NuevaReceta extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/receta_nueva';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@nombre' => '#nombre',
            '@time' => '#time',
            '@comensales' => '#comensales',
            '@dificultad' => '#dificultad',
            '@extracto' => '#extracto',
            '@proceso' => '#proceso',
            '@imagen' => '#imagen'
        ];
    }
}
