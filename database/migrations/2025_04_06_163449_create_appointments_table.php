<?php

use App\Enums\AppointmentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('restrict');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('restrict');
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('restrict');

            $table->dateTime('appointment_date');
            // $table->enum('status', AppointmentStatus::getValues())->default(AppointmentStatus::PENDING);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
