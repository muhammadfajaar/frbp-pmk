<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
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
            'slug' => $this->faker->slug(),
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'date_birth' => $this->faker->date('Y/m/d'),
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'marital_status' => $this->faker->randomElement(['Lajang', 'Janda', 'Duda']),
            'work' => $this->faker->randomElement(['Mahasiswa', 'TNI', 'PNS', 'Guru', 'Dosen', 'Mansyarakat']),
            'date_joined' => $this->faker->date('Y/m/d')
        ];
    }
}
