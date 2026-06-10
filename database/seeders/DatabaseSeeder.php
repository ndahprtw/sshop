<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PabrikSeeder::class,
            KategoriSeeder::class,
            ProdukSeeder::class,
            PembelianSeeder::class,
            RatingProdukSeeder::class,
            RatingSistemSeeder::class,
            SettingSeeder::class,
            CarouselSeeder::class
        ]);
    }
}
