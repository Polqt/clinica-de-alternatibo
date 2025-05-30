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
                'phone_number' => '',
                'address' => '',
                'postal_code' => '',
                'city' => '',
                'date_of_birth' => '',
                'gender' => '',
                'blood_type' => '',
                'profile_picture' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
