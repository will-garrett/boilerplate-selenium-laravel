<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class RegisterTest extends DuskTestCase
{
    use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    
    public function testValidRegistration()
    {
        $data = factory(\App\User::class)->make();
        
        $this->browse(function (Browser $browser) use ($data) {
            $browser->visit('/register')
                ->assertSee('Register')
                ->value('@name', $data['name'])
                ->value('@email', $data['email'])
                ->value('@password', $data['password'])
                ->value('@password-confirm', $data['password'])
                ->click('@submit')
                ->waitForLocation("/home")
                ->pause(3000)
                ->assertSee('You are logged in!')
                ->assertSee($data->name);
        });
        

    }
}
