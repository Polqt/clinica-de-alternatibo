<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = DB::table('doctors')->get();
        $specializations = DB::table('specializations')->pluck('id')->toArray();

        foreach ($doctors as $doctor) {
            $randomSpecialization = $specializations[array_rand($specializations)];

            DB::table('doctor_specialization')->insert([
                'doctor_id' => $doctor->id,
                'specialization_id' => $randomSpecialization,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
