<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Node\Block\Paragraph;

class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1,3),
            'date' => $this->faker->date('m/d/Y'),
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->time('H:i'),
            'activity' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'location' => $this->faker->address(),
            'deskription' => $this->faker->paragraph()
        ];
    }
}
