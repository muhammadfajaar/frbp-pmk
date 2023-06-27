<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 5),
            'gallery_category_id' => mt_rand(1, 4),
            'description' => $this->faker->paragraph(),
            'slug' => $this->faker->slug()
        ];
    }
}
