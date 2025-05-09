<?php

namespace App\Services\Appointment;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EditServices
{
    /**
     * @param int $appointmentId
     * @param array $data
     * @return Appointment
     * @throws \Exception
     */
    public function updateWithAuth(int $appointmentId, array $data): Appointment
    {
        $appointment = Appointment::findOrFail($appointmentId);

        $this->validateAppointmentStatus($appointment);

        return $this->update($appointment, $data);
    }

    /**
     * @param Appointment $appointment
     * @param array $data
     * @return Appointment
     */
    public function update(Appointment $appointment, array $data): Appointment
    {
        DB::beginTransaction();

        try {
            $data = $this->prepareAppointmentData($data);

            // If date or doctor has been changed, validate the new time slot.
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

            if (isset($data['notes'])) {
                $data['clinic_notes'] = $data['notes'];
                unset($data['notes']);
            }

            $appointment->update([
                'doctor_id' => $data['doctor_id'] ?? $appointment->doctor_id,
                'appointment_date' => $data['appointment_date'] ?? $appointment->appointment_date,
                'status' => $data['status'] ?? $appointment->status,
                'clinic_notes' => $data['clinic_notes'] ?? $appointment->clinic_notes,
            ]);

            $appointment->save();

            DB::commit();

            return $appointment;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param Appointment $appointment
     * @return bool
     * @throws \Exception
     */
    private function validateAppointmentStatus(Appointment $appointment): bool
    {
        $nonEditableStatuses = [
            AppointmentStatus::CancelledByPatient->value => 'This appointment has been cancelled by you and cannot be edited.',
            AppointmentStatus::CancelledByClinic->value => 'This appointment has been cancelled by the clinic and cannot be edited.',
            AppointmentStatus::Completed->value => 'Completed appointments cannot be edited.'
        ];

        if (array_key_exists($appointment->status, $nonEditableStatuses)) {
            throw new \Exception($nonEditableStatuses[$appointment->status]);
        }

        return true;
    }

    /**
     * @param array $data
     * @return array
     */
    private function prepareAppointmentData(array $data): array
    {
        if (isset($data['appointment_date']) && isset($data['appointment_time'])) {
            $data['appointment_date'] = trim($data['appointment_date'] . ' ' . $data['appointment_time']);
            unset($data['appointment_time']);
        }

        return $data;
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
        try {
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

            $conflictingAppointment = $checkSlot->exists();

            if ($conflictingAppointment) {
                throw new \Exception('The appointment time is already booked.');
            }

            return true;
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'between 9 AM and 5 PM') !== false) {
                throw $e;
            }
            throw new \Exception('Invalid appointment date or time format: ' . $e->getMessage());
        }
    }
}
