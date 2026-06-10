<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pembelians = DB::table('pembelians')->get();

        foreach ($pembelians as $pembelian) {
            DB::table('rating_produks')->insert([
                'id' => Str::uuid(),
                'pembelian_id' => $pembelian->id,
                'user_id' => $pembelian->user_id,
                'rating' => rand(4, 5),
                'ulasan' => 'Produk cocok di jenis kulit saya',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
