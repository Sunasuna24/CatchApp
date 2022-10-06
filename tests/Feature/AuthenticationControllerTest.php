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
    function register_valid_user_data()
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

    /** @test */
    function validate_user_data()
    {
        $this->from(route('register'))->post(route('register'), [])->assertRedirect(route('register'));

        // name周り
        $this->post(route('register'), ['name' => ''])->assertInvalid(['name' => 'エラー']);
        $this->post(route('register'), ['name' => str_repeat('a', 3)])->assertInvalid(['name' => 'エラー']);
        $this->post(route('register'), ['name' => str_repeat('a', 4)])->assertValid('name');
        
        // email周り
        User::create(['emai' => 'sample@email.com']);
        $this->post(route('register'), ['email' => ''])->assertInvalid(['email' => 'エラー']);
        $this->post(route('register'), ['email' => 'aaa@bbb@ccc'])->assertInvalid(['email' => 'エラー']);
        $this->post(route('register'), ['email' => 'あああ@いいい.ううう'])->assertInvalid(['email' => 'エラー']);
        $this->post(route('register'), ['email' => 'sample@email.com'])->assertInvalid(['email' => 'エラー']);
        
        // password周り
        $this->post(route('register'), ['password' => ''])->assertInvalid(['password' => 'エラー']);
        $this->post(route('register'), ['password' => '1234567'])->assertInvalid(['password' => 'エラー']);
        $this->post(route('register'), ['password' => '12345678'])->assertValid('password');
    }
}
