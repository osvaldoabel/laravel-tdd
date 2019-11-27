<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_user_using_form()
    {
        $this->browse(function (Browser $browser) {
            // $browser->pause(1000);
            $browser->visit('/')->assertSee('Register');
        });
    }
}
