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
            $table->enum('status', array_column(AppointmentStatus::cases(), 'value'))->default(AppointmentStatus::Scheduled->value);
            $table->text('clinic_notes')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->foreignId('created_by_user_id')->constrained('users')->onDelete('restrict');

            $table->index(['patient_id', 'appointment_date']);
            $table->index(['doctor_id', 'appointment_date']);
            $table->index(['clinic_id', 'appointment_date']);
            $table->index('status');
            $table->index('appointment_date');

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
