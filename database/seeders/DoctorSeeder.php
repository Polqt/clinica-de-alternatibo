<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doctors')->insert([
            [
                'first_name' => 'Jani',
                'last_name' => 'Esperancilla',
                'license_number' => '0234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Winjani',
                'last_name' => 'Espatola',
                'license_number' => '1234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Ice',
                'last_name' => 'IceBaby',
                'license_number' => '2345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jul',
                'last_name' => 'Maps',
                'license_number' => '3456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Popi',
                'last_name' => 'Fortaliza',
                'license_number' => '4567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Ted',
                'last_name' => 'Talks',
                'license_number' => '5678901',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Ed',
                'last_name' => 'Pota',
                'license_number' => '6789012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Stal',
                'last_name' => 'Games',
                'license_number' => '7890123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Bini',
                'last_name' => 'Anya',
                'license_number' => '8901234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Aprilinario',
                'last_name' => 'Mabini',
                'license_number' => '9012345',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
