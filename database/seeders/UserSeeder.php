<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // [
            //     'first_name' => 'Jonard',
            //     'last_name' => 'Esperancilla',
            //     'email' => 'jonard@gmail.com',
            //     'password' => Hash::make('user123'),
            //     'role' => 'user',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'first_name' => 'Julian Diego',
            //     'last_name' => 'Mapa',
            //     'email' => 'julmaps@gmail.com',
            //     'password' => Hash::make('user123'),
            //     'role' => 'user',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'first_name' => 'Jul',
            //     'last_name' => 'Mapa',
            //     'email' => 'imdmaps@gmail.com',
            //     'password' => Hash::make('user123'),
            //     'role' => 'user',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'first_name' => 'Admin',
                'last_name' => 'Winjan',
                'email' => 'admin@medicare.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
