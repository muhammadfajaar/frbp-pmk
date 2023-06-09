<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'whatsapp_or_email' => $this->faker->safeEmail(),
            'message' => $this->faker->paragraph()
        ];
    }
}
