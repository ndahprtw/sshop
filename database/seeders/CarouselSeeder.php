<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Carousel::create([
            'carousel_image' => 'skincare.png',
            'title' => 'Beragam Skincare',
            'deskripsi' => 'Menyediakan beragam skincare dari produk ternama',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Carousel::create([
            'carousel_image' => 'skincare2.png',
            'title' => 'Rawat Diri Kamu Sekarang',
            'deskripsi' => 'Menyediakan beragam skincare dari produk ternama',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
