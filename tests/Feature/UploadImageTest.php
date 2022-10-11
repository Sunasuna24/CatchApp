<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function show_upload_page()
    {
        $this->get('/post')->assertRedirect(route('login'));

        User::factory()->create();
        $user = User::first();

        $this->actingAs($user)->get('/post')->assertOk()->assertViewIs('post');
    }

    /** @test */
    function uploading_images()
    {
        User::factory()->create();
        $user = User::first();

        Storage::fake('local');

        $file = UploadedFile::fake()->image('story.jpg');
        $this->actingAs($user)->post(route('post'), [
            'local' => $file
        ]);

        Storage::disk('local')->assertExists($file->hashName());
    }
}
