<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemasok>
 */
class PemasokFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pemasok' => fake()->company(),
            'nama_kontak' => fake()->name(),
            'nomor_hp' => fake()->e164PhoneNumber(),
            'alamat' => fake()->address(),
            'region' => fake()->randomElement($array = array('dalam kota', 'dalam provinsi', 'dalam negeri', 'luar negeri')),
        ];
    }
}
