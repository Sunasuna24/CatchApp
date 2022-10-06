<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function access_to_register_page()
    {
        User::factory()->create();
        $user = User::first();

        $this->get(route('register'))->assertOk()->assertViewIs('auth.register');
        $this->actingAs($user)->get(route('register'))->assertRedirect(route('home'));
    }

    /** @test */
    function register_to_application()
    {
        $valid_data = [
            'name' => 'test1',
            'email' => 'test1@email.com',
            'password' => 'password'
        ];

        $this->assertDatabaseMissing('users', $valid_data);

        $this->post(route('register'), $valid_data)->assertRedirect(route('home'));

        $user = User::first();
        $raw_password = $valid_data['password'];
        unset($valid_data['password']);
        $this->assertDatabaseHas('users', $valid_data);
        $this->assertTrue(Hash::check($raw_password, $user->password));
        $this->assertAuthenticatedAs($user);
    }
}
