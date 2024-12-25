<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'nama_barang' => 'Kursi Kantor',
            'merk' => 'Doodook',
            'jenis' => 'Kursi kantor air spring',
            'satuan_id' => '1',
        ]);
        Barang::create([
            'nama_barang' => 'Kursi Sofa',
            'merk' => 'Soph',
            'jenis' => 'Kursi sofa panjang',
            'satuan_id' => '1',
        ]);
        Barang::create([
            'nama_barang' => 'Meja Kerja',
            'merk' => 'Gawee',
            'jenis' => 'Meja kerja kayu dan kabinet',
            'satuan_id' => '1',
        ]);
        Barang::create([
            'nama_barang' => 'Kipas Angin',
            'merk' => 'Semwing',
            'jenis' => 'Kipas angin dinding',
            'satuan_id' => '1',
        ]);
        Barang::create([
            'nama_barang' => 'Karpet',
            'merk' => 'Ambal',
            'jenis' => 'Karpet permadani',
            'satuan_id' => '2',
        ]);
        Barang::create([
            'nama_barang' => 'Monitor Komputer',
            'merk' => 'Nitro',
            'jenis' => 'Ultrawide 24 inch',
            'satuan_id' => '1',
        ]);
        Barang::create([
            'nama_barang' => 'Komputer Personal',
            'merk' => 'Ternal',
            'jenis' => 'Core i7 Gen 12, SSD 256 GB, Ram 8 GB',
            'satuan_id' => '1',
        ]);
    }
}
