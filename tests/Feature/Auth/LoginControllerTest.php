<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
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
        User::factory()->create([
            'email' => $valid_data['email'],
            'password' => Hash::make($valid_data['password'])
        ]);

        $this->get(route('home'))->assertRedirect(route('login'));
        $this->assertGuest();
        $this->post(route('login'), $valid_data)->assertRedirect(route('home'));
        $this->assertAuthenticated();
    }

    /** @test */
    function validate_user_data()
    {
        User::factory()->create(['email' => 'sample@email.com', 'password' => Hash::make('password')]);

        $this->from(route('login'))->post(route('login'), [])->assertRedirect(route('login'));

        $this->post(route('login'), ['email' => ''])->assertInvalid(['email' => '必ず指定']);
        $this->post(route('login'), ['password' => ''])->assertInvalid(['password' => '必ず指定']);
    }

    /** @test */
    function redirect_to_notice_if_email_not_verified()
    {
        User::factory()->create([
            'name' => 'test',
            'email' => 'test@email.com',
            'password' => Hash::make('password'),
            'email_verified_at' => null
        ]);
        $user = User::first();

        $this->actingAs($user)->get(route('home'))->assertRedirect(route('verification.notice'));
        $this->get(route('verification.notice'))->assertViewIs('auth.verify-email');

        $user->email_verified_at = now();
        $user->save();

        $this->actingAs($user)->get(route('home'))->assertOk();
    }

    /** @test */
    function logout_from_application()
    {
        User::factory()->create();
        $user = User::first();

        $this->actingAs($user)->get(route('logout'))->assertRedirect(route('top'));
        $this->assertGuest();
    }
}
