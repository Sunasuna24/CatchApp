<?php

namespace Tests\Feature;

use App\Models\Story;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Testing\File;
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
        Storage::fake('public');
        User::factory()->create();
        $user = User::first();

        $file = File::create('story.jpeg', 100);
        $this->post(route('post'), ['path' => 'sample', 'story' => $file])->assertRedirect(route('login'));

        $this->actingAs($user)->post(route('post'), ['path' => 'sample', 'story' => $file]);

        $story = Story::first();
        $this->assertNotNull($story->path);
        $this->assertEquals('sample', $story->name);

        Storage::disk('public')->assertExists($story->path);
        $this->assertFileEquals($story, Storage::disk('public')->path($story->path));
    }
}
