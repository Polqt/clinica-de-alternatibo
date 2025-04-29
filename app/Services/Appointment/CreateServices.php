<?php

namespace App\Services\Appointment;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreateServices
{
    /**
     * @param array $data
     * @return Appointment
     */
    public function create(array $data): Appointment
    {
        DB::beginTransaction();

        try {
            $this->validateTimeSlot($data['doctor_id'], $data['appointment_date']);

            $appointment = new Appointment();
            $appointment->patient_id = $data['patient_id'];
            $appointment->doctor_id = $data['doctor_id'];
            $appointment->appointment_date = $data['appointment_date'];
            $appointment->status = $data['status'] ?? AppointmentStatus::Scheduled->value;
            $appointment->clinical_notes = $data['clinical_notes'] ?? null;
            $appointment->created_by_user_id = $data['created_by_user_id'];
            $appointment->save();

            DB::commit();

            return $appointment;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param int $doctorId
     * @param string $appointmentDate
     * @return bool
     * @throws \Exception
     */

    private function validateTimeSlot(int $doctorId, string $appointmentDate): bool
    {
        $date = Carbon::parse($appointmentDate);

        $hour = (int) $date->format('H');

        if ($hour < 9 || $hour >= 17) {
            throw new \Exception('The appointment time must be between 9 AM and 5 PM.');
        }

        $conflictingAppointment = Appointment::where('doctor_id', $doctorId)
            ->where('appointment_date', $date->format('Y-m-d H:i:s'))
            ->whereNotIn('status', [
                AppointmentStatus::CancelledByClinic->value,
                AppointmentStatus::CancelledByPatient->value
            ])
            ->exists();

        if ($conflictingAppointment) {
            throw new \Exception('The doctor is already booked for this time slot.');
        }

        return true;
    }
}
