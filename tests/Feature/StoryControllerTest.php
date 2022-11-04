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

        $this->actingAs($user)->from(route('story'))->post(route('story'), [])->assertRedirect(route('story'));

        $this->actingAs($user)->post(route('story'), ['photo' => ''])->assertInvalid(['photo' => '必ず指定']);
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
        Storage::disk('public')->assertExists('stories/' . $file->hashName()); 
    }
}
