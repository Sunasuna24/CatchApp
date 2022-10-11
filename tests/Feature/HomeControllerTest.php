<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function access_to_top_page()
    {
        User::factory()->create();
        $user = User::first();

        $this->get('/')->assertOk()->assertViewIs('top');
        $this->actingAs($user)->get('/')->assertRedirect(route('home'));
    }
}
