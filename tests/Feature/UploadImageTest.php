<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UploadImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function show_upload_page()
    {
        $this->get('/post')->assertRedirect(route('login'));

        User::factory()->create();
        $user = User::first();

        $this->actingAs($user)->get('/post')->assertOk()->assertViewIs('post');
    }
}
