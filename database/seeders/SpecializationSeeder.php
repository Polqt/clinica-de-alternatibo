<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->insert([
            [
                'name' => 'Cardiology',
                'description' => 'Diagnosis and treatment of heart disorders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dermatology',
                'description' => 'Diagnosis and treatment of skin disorders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Endocrinology',
                'description' => 'Diagnosis and treatment of hormone-related disorders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gastroenterology',
                'description' => 'Diagnosis and treatment of digestive system disorders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Neurology',
                'description' => 'Diagnosis and treatment of nervous system disorders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Obstetrics and Gynecology',
                'description' => 'Healthcare for women, especially during pregnancy and childbirth',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Oncology',
                'description' => 'Diagnosis and treatment of cancer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ophthalmology',
                'description' => 'Diagnosis and treatment of eye disorders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Orthopedics',
                'description' => 'Diagnosis and treatment of musculoskeletal disorders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pediatrics',
                'description' => 'Healthcare for infants, children, and adolescents',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Psychiatry',
                'description' => 'Diagnosis and treatment of mental disorders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pulmonology',
                'description' => 'Diagnosis and treatment of respiratory system disorders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Radiology',
                'description' => 'Use of imaging techniques for diagnosis and treatment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Urology',
                'description' => 'Diagnosis and treatment of urinary tract disorders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Family Medicine',
                'description' => 'Comprehensive healthcare for individuals and families',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Internal Medicine',
                'description' => 'Diagnosis and treatment of adult diseases',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emergency Medicine',
                'description' => 'Immediate care for acute illnesses and injuries',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anesthesiology',
                'description' => 'Administration of anesthetics and pain management',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pathology',
                'description' => 'Study and diagnosis of disease through examination of organs, tissues, and bodily fluids',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rheumatology',
                'description' => 'Diagnosis and treatment of rheumatic diseases and autoimmune conditions',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
