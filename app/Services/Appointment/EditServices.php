<?php

namespace App\Services\Appointment;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EditServices
{
    /**
     * @param Appointment $appointment
     * @param array $data
     * @return Appointment
     */
    public function update(Appointment $appointment, array $data): Appointment
    {
        DB::beginTransaction();

        try {
            // If date or doctor has been changed, validate ang new time slot.
            if (
                (isset($data['doctor_id']) && $data['doctor_id'] != $appointment->doctor_id) ||
                (isset($data['appointment_date']) && $data['appointment_date'] != $appointment->appointment_date)
            ) {
                $this->validateTimeSlot(
                    $data['doctor_id'] ?? $appointment->doctor_id,
                    $data['appointment_date'] ?? $appointment->appointment_date,
                    $appointment->id
                );
            }

            // Update the appointment with the new data.
            $appointment->update([
                'doctor_id' => $data['doctor_id'] ?? $appointment->doctor_id,
                'appointment_date' => $data['appointment_date'] ?? $appointment->appointment_date,
                'status' => $data['status'] ?? $appointment->status,
                'clinic_notes' => $data['clinic_notes'] ?? $appointment->clinic_notes,
            ]);

            $appointment->save();

            return $appointment;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param int $doctorId
     * @param string $appointmentDate
     * @param int|null $excludeAppointmentId
     * @return bool
     * @throws \Exception
     */

    private function validateTimeSlot(int $doctorId, string $appointmentDate, ?int $excludeAppointmentId = null): bool
    {

        $date = Carbon::parse($appointmentDate);

        $hour = (int) $date->format('H');
        if ($hour < 9 || $hour >= 17) {
            throw new \Exception('The appointment time must be between 9 AM and 5 PM.');
        }

        $checkSlot = Appointment::where('doctor_id', $doctorId)
            ->where('appointment_date', $date->format('Y-m-d H:i:s'))
            ->whereNotIn('status', [
                AppointmentStatus::CancelledByClinic->value,
                AppointmentStatus::CancelledByPatient->value,
            ]);

        if ($excludeAppointmentId) {
            $checkSlot->where('id', '!=', $excludeAppointmentId);
        }

        $conflictingAppointment  = $checkSlot->exists();

        if ($conflictingAppointment) {
            throw new \Exception('The appointment time is already booked.');
        }

        return true;
    }
}
