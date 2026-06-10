<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'gender' => 'P',
            'tanggal_lahir' => '2000-01-01',
            'phone_number' => '20000101',
            // 'profile' => 'oii',
            'address' => 'jalan kenangan',
            'role' => 'user',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'gender' => 'P',
            'tanggal_lahir' => '2000-01-01',
            'phone_number' => '20000101',
            // 'profile' => 'oii',
            'address' => 'jalan kenangan',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);

        $faker = Faker::create();

        $users = [];
        
        for ($i = 0; $i < 5; $i++) {
            $users[] = [
                'id' => Str::uuid(),
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'gender' => $faker->randomElement(['L', 'P']),
                'tanggal_lahir' =>  $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
                'phone_number' =>  $faker->phoneNumber,
                'profile' => null,
                'address' => $faker->address,
                'role' => 'user',
                'password' => Hash::make('12345'),
            ];
        }
        DB::table('users')->insert($users);

    }
}
