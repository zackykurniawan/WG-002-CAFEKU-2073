<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_register()
    {
        $response = $this->post('/register',[
            'name'=>'admin2',
            'email'=>'admin2@gmail.com',
            'password'=>'admin123',
            'password_confirmation'=>'admin123',
            'role'=>'admin',
        ]);


        $response->assertRedirect('/home');
    }

    public function test_login()
    {
        $response = $this->post('/login',[
            'email'=>'admin2@gmail.com',
            'password'=>'admin123',
        ]);

        $response->assertRedirect('/home');
    }
}
