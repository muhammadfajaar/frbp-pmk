<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DisasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'disaster_category_id' => mt_rand(1, 9),
            'subdistrict_id' => mt_rand(1, 13),
            'penyebab' => $this->faker->paragraph(),
            'slug' => $this->faker->slug(),
            'hilang' => mt_rand(1, 10),
            'meninggal_dunia' => mt_rand(1, 10),
            'mengungsi' => mt_rand(1, 10),
            'luka_luka' => mt_rand(1, 10),
            'rumah_rusak_ringan' => mt_rand(1, 10),
            'rumah_rusak_sedang' => mt_rand(1, 10),
            'rumah_rusak_berat' => mt_rand(1, 10),
            'rumah_terendam' => mt_rand(1, 10),
            'fas_pendidikan' => mt_rand(1, 10),
            'fas_ibadah' => mt_rand(1, 10),
            'fas_kesehatan' => mt_rand(1, 10),
            'fas_umum' => mt_rand(1, 10),
            'location' => $this->faker->address(),
            'waktu' => $this->faker->date('m/d/Y')
        ];
    }
}
