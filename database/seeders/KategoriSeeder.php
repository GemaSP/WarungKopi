<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_kategori' => 'Espresso & Brewed Coffee'
            ],

            [
                'nama_kategori' => 'Frapuccino (Blended Beverages)'
            ],

            [
                'nama_kategori' => 'Teavana (Tea)'
            ],

            [
                'nama_kategori' => 'Minuman Lainnya'
            ],

            [
                'nama_kategori' => 'Makanan'
            ]
        ];

        foreach ($data as $kategori) {
            Kategori::create($kategori);
        }
    }
}
