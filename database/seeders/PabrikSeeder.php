<?php

namespace Database\Seeders;

use App\Models\Pabrik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PabrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pabrik::create([
            'nama_pabrik' => 'Emina',
            'logo' => 'emina.jpg',
            'whatsApp' => '6282132331949',
            'instagram' => 'eminacosmetics',
            'email' => 'indhpratw@gmail.com'
        ]);
        Pabrik::create([
            'nama_pabrik' => 'Wardah',
            'logo' => 'wardah.png',
            'whatsApp' => '6282132331949',
            'instagram' => null,
            'email' => null
        ]);
        Pabrik::create([
            'nama_pabrik' => 'Kahf',
            'logo' => 'kahf.jpeg',
            'whatsApp' => '6282132331949',
            'instagram' => null,
            'email' => null
        ]);
        Pabrik::create([
            'nama_pabrik' => 'Azarine',
            'logo' => 'azarine.jpg',
            'whatsApp' => '6282132331949',
            'instagram' => null,
            'email' => null
        ]);
        Pabrik::create([
            'nama_pabrik' => 'Hadalabo',
            'logo' => 'hadalabo.jpg',
            'whatsApp' => '6282132331949',
            'instagram' => null,
            'email' => null
        ]);
        Pabrik::create([
            'nama_pabrik' => 'Somethinc',
            'logo' => 'somethinc.png',
            'whatsApp' => '6282132331949',
            'instagram' => null,
            'email' => null
        ]);
    }
}
