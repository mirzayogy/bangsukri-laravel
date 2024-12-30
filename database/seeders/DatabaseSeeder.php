<?php

namespace Database\Seeders;

use App\Models\Ruang;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RuangSeeder::class);
        $this->call(SatuanSeeder::class);
        $this->call(PemasokSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(PenggunaSeeder::class);

        Ruang::factory()->create();
        Ruang::factory()->create([
            'nama_ruang' => 'Lima',
        ]);
        Ruang::factory(3)->create();
    }
}
