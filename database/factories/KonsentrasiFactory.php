<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KonsentrasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(rand(1, 2));
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}