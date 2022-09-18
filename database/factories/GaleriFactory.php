<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl(640, 480),
            'keterangan' => $this->faker->sentence(3),
            'pesantren_id' => 1,
        ];
    }
}