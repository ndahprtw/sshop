<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriProduk::create([
            'nama_kategori' => 'Facial Wash',
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Mosturizer',
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Toner',
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Serum',
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Body Lotion',
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Lip Balm',
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Lip Mask',
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Lip Serum',
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Masker Wajah',
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Eye Cream',
        ]);
    }
}
