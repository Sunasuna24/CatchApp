<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function access_to_register_page()
    {
        User::factory()->create();
        $user = User::first();

        $this->get(route('register'))->assertOk()->assertViewIs('auth.register');
        $this->actingAs($user)->get(route('register'))->assertRedirect(route('home'));
    }
}
