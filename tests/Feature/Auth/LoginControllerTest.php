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
}
