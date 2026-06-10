<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('produks')->insert([
            'id' => Str::uuid(),
            'toko_id' => DB::table('pabriks')->where('nama_pabrik', 'Azarine')->first()->id,
            'kategori_id' => DB::table('kategori_produks')->where('nama_kategori', 'Mosturizer')->first()->id,
            'nama_produk' => 'Azarine Barrier Moisturizer',
            'foto_produk' => 'azarine_mosturizer.jpg',
            'harga' => 25000,
            'stok' => $faker->numberBetween(1, 100),
            'deskripsi' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produks')->insert([
            'id' => Str::uuid(),
            'toko_id' => DB::table('pabriks')->where('nama_pabrik', 'Azarine')->first()->id,
            'kategori_id' => DB::table('kategori_produks')->where('nama_kategori', 'Body Lotion')->first()->id,
            'nama_produk' => 'Azarine Body Lotion Ageless Glow 100ml',
            'foto_produk' => 'azarine_bodylotion.jpg',
            'harga' => 25000,
            'stok' => $faker->numberBetween(1, 100),
            'deskripsi' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produks')->insert([
            'id' => Str::uuid(),
            'toko_id' => DB::table('pabriks')->where('nama_pabrik', 'Emina')->first()->id,
            'kategori_id' => DB::table('kategori_produks')->where('nama_kategori', 'Masker Wajah')->first()->id,
            'nama_produk' => 'Emina Bright Stuff Essence Sheet Mask',
            'foto_produk' => 'emina_maskerwajah.jpg',
            'harga' => 25000,
            'stok' => $faker->numberBetween(1, 100),
            'deskripsi' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produks')->insert([
            'id' => Str::uuid(),
            'toko_id' => DB::table('pabriks')->where('nama_pabrik', 'Emina')->first()->id,
            'kategori_id' => DB::table('kategori_produks')->where('nama_kategori', 'Mosturizer')->first()->id,
            'nama_produk' => 'Emina Bright Stuff Mosturizer Cream Acne Prone 20 ml',
            'foto_produk' => 'emina_mosturizer.jpg',
            'harga' => 25000,
            'stok' => $faker->numberBetween(1, 100),
            'deskripsi' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produks')->insert([
            'id' => Str::uuid(),
            'toko_id' => DB::table('pabriks')->where('nama_pabrik', 'Hadalabo')->first()->id,
            'kategori_id' => DB::table('kategori_produks')->where('nama_kategori', 'Eye Cream')->first()->id,
            'nama_produk' => 'Hada Labo Gokujyun Premium Eye Cream 15g',
            'foto_produk' => 'hadalabo_eyecream.jpg',
            'harga' => 25000,
            'stok' => $faker->numberBetween(1, 100),
            'deskripsi' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produks')->insert([
            'id' => Str::uuid(),
            'toko_id' => DB::table('pabriks')->where('nama_pabrik', 'Kahf')->first()->id,
            'kategori_id' => DB::table('kategori_produks')->where('nama_kategori', 'Facial Wash')->first()->id,
            'nama_produk' => "Kahf Skin Energizing and Brightening Face Wash 100 ml",
            'foto_produk' => 'kahf_facialwash.jpg',
            'harga' => 25000,
            'stok' => $faker->numberBetween(1, 100),
            'deskripsi' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produks')->insert([
            'id' => Str::uuid(),
            'toko_id' => DB::table('pabriks')->where('nama_pabrik', 'Somethinc')->first()->id,
            'kategori_id' => DB::table('kategori_produks')->where('nama_kategori', 'Lip Mask')->first()->id,
            'nama_produk' => 'Somethinc Bee Power Propolis Series - Glow Lip Serum',
            'foto_produk' => 'somethinc_lipmask.jpg',
            'harga' => 25000,
            'stok' => $faker->numberBetween(1, 100),
            'deskripsi' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produks')->insert([
            'id' => Str::uuid(),
            'toko_id' => DB::table('pabriks')->where('nama_pabrik', 'Wardah')->first()->id,
            'kategori_id' => DB::table('kategori_produks')->where('nama_kategori', 'Toner')->first()->id,
            'nama_produk' => 'Wardah Lightening Face Toner 125ml',
            'foto_produk' => 'wardah_toner.jpg',
            'harga' => 25000,
            'stok' => $faker->numberBetween(1, 100),
            'deskripsi' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produks')->insert([
            'id' => Str::uuid(),
            'toko_id' => DB::table('pabriks')->where('nama_pabrik', 'Wardah')->first()->id,
            'kategori_id' => DB::table('kategori_produks')->where('nama_kategori', 'Serum')->first()->id,
            'nama_produk' => 'Wardah Lightening Facial Serum 30 ml',
            'foto_produk' => 'wardah-serum.jpg',
            'harga' => 25000,
            'stok' => $faker->numberBetween(1, 100),
            'deskripsi' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produks')->insert([
            'id' => Str::uuid(),
            'toko_id' => DB::table('pabriks')->where('nama_pabrik', 'Wardah')->first()->id,
            'kategori_id' => DB::table('kategori_produks')->where('nama_kategori', 'Mosturizer')->first()->id,
            'nama_produk' => 'Wardah UV Shield Essential Sunscreen Gel SPF 35+++',
            'foto_produk' => 'wardah-sunscreen.jpeg',
            'harga' => 25000,
            'stok' => $faker->numberBetween(1, 100),
            'deskripsi' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
