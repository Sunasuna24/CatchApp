<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function access_to_login_page()
    {
        User::factory()->create();
        $user = User::first();

        $this->get(route('login'))->assertOk()->assertViewIs('auth.login');
        $this->actingAs($user)->get(route('login'))->assertRedirect(route('home'));
    }

    /** @test */
    function login_valid_user()
    {
        $valid_data = [
            'email' => 'test1@email.com',
            'password' => 'password'
        ];
        User::factory()->create($valid_data);
        $user = User::first();

        $this->get(route('home'))->assertRedirect(route('login'));
        $this->post(route('login'), [])->assertRedirect(route('login'));
        $this->actingAs($user)->post(route('login'), $valid_data)->assertRedirect(route('home'));
    }
}
