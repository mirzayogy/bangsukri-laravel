<?php

namespace Database\Seeders;

use App\Models\Pemasok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemasokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemasok::create([
            'nama_pemasok' => 'CV Alading',
            'nama_kontak' => 'Mas Dindin',
            'nomor_hp' => '08000000',
            'alamat' => 'Banjarbaru',
            'region' => 'dalam kota',
        ]);

        Pemasok::create([
            'nama_pemasok' => 'CV Benalu',
            'nama_kontak' => 'Mbak Pia',
            'nomor_hp' => '08000001',
            'alamat' => 'Martapura',
            'region' => 'dalam provinsi',
        ]);
    }
}
