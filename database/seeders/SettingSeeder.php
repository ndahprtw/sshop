<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'alamat' => 'Jl. Mayjend Sungkono No.5 Bangkalan',
                'alamat_rujukan' => 'https://www.google.com/maps/place/Jl.+Mayjen+Sungkono+No.5,+Keraton,+Kec.+Bangkalan,+Kabupaten+Bangkalan,+Jawa+Timur+69119/@-7.0305025,112.7498228,17z/data=!3m1!4b1!4m5!3m4!1s0x2dd80585e74236d9:0xfebceff63ca07a04!8m2!3d-7.0305025!4d112.7523977?entry=ttu',
                'iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.9544711180597!2d112.7523568286965!3d-7.030680444693357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd80585e74236d9%3A0xfebceff63ca07a04!2sJl.%20Mayjen%20Sungkono%20No.5!5e0!3m2!1sid!2sid!4v1718250700128!5m2!1sid!2sid',
                'telepon' => '6282132331949',
                'email' => 'indhpratw@gmail.com',
                'instagram' => '#',
                'facebook' => '#',
            ]
        ]);
    }
}
