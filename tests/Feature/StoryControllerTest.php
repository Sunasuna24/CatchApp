<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoryControllerTest extends TestCase
{
    /** @test */
    function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
