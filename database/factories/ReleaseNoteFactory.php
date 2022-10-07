<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReleaseNoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(rand(1,4)),
            'detail' => $this->faker->realText
        ];
    }
}
