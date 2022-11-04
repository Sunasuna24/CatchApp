<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function access_to_post_story_page()
    {
        User::factory()->create();
        $user = User::first();

        $this->get(route('story'))->assertRedirect(route('login'));
        $this->actingAs($user)->get(route('story'))->assertOk()->assertViewIs('story.post');
    }

    /** @test */
    function validate_story_images()
    {
        User::factory()->create();
        $user = User::first();

        Storage::fake('public');
        $jpg_image = UploadedFile::fake()->image('sample_story.jpg');
        $png_image = UploadedFile::fake()->image('sample_story.png');
        $jpeg_image = UploadedFile::fake()->image('sample_story.jpeg');
        $pdf_image = UploadedFile::fake()->image('sample_story.pdf');
        $just_size_image = UploadedFile::fake()->image('just_size_image.jpg')->size(2048);
        $too_big_image = UploadedFile::fake()->image('too_big_image.jpg')->size(2049);

        $this->actingAs($user)->from(route('story'))->post(route('story'), [])->assertRedirect(route('story'));
        $this->actingAs($user)->post(route('story'), ['photo' => ''])->assertInvalid(['photo' => '必ず指定']);
        $this->actingAs($user)->post(route('story'), ['photo' => $jpg_image])->assertRedirect(route('home'));
        $this->actingAs($user)->post(route('story'), ['photo' => $png_image])->assertRedirect(route('home'));
        $this->actingAs($user)->post(route('story'), ['photo' => $jpeg_image])->assertRedirect(route('home'));
        $this->actingAs($user)->post(route('story'), ['photo' => $pdf_image])->assertInvalid(['photo' => 'タイプのファイルを指定']);
        $this->actingAs($user)->post(route('story'), ['photo' => $just_size_image])->assertRedirect(route('home'));
        $this->actingAs($user)->post(route('story'), ['photo' => $too_big_image])->assertInvalid(['photo' => 'kB以下のファイルを指定']);
    }

    /** @test */
    function post_stories()
    {
        User::factory()->create();
        $user = User::first();

        $this->post(route('story'), [])->assertRedirect(route('login'));

        Storage::fake('public');
        $file = UploadedFile::fake()->image('sample_story.jpg');

        $this->actingAs($user)->post(route('story'), ['photo' => $file]);
        Storage::disk('public')->assertExists("stories/{$file->hashName()}"); 
    }

    /** @test */
    function store_user_and_path_info_to_stories_table()
    {
        User::factory()->create();
        $user = User::first();

        Storage::fake('public');
        $file = UploadedFile::fake()->image('sample_story.jpg');

        $this->actingAs($user)->post(route('story'), ['photo' => $file]);
        $this->assertDatabaseHas('stories', [
            'user_id' => $user->id,
            'path' => "stories/{$file->hashName()}"
        ]);
    }
}
