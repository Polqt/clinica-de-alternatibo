<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('profiles')->insert([
            [
                'user_id' => 1,
                'phone-number' => '0987654321',
                'address' => '123 Hidalgo St.',
                'postal_code' => '6100',
                'city' => 'Bacolod City',
                'date_of_birth' => '2004-05-15',
                'gender' => 'Male',
                'blood_type' => 'O+',
                'profile_picture' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'phone-number' => '09123456789',
                'address' => '789 Luna St.',
                'postal_code' => '6100',
                'city' => 'Bago City',
                'date_of_birth' => '2002-10-22',
                'gender' => 'Male',
                'blood_type' => 'B-',
                'profile_picture' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'phone-number' => '09087654321',
                'address' => '101 Bonifacio St.',
                'postal_code' => '6100',
                'city' => 'Cadiz City',
                'date_of_birth' => '2003-02-28',
                'gender' => 'Male',
                'blood_type' => 'O-',
                'profile_picture' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'phone-number' => '09998877665',
                'address' => '456 Rizal St.',
                'postal_code' => '6100',
                'city' => 'Silay City',
                'date_of_birth' => '1988-12-25',
                'gender' => 'Male',
                'blood_type' => 'A-',
                'profile_picture' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
