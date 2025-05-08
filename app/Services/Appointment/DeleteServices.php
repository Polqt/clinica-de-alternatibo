<?php

namespace App\Services\Appointment;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class DeleteServices
{
    /**
     * @param int $appointmentId
     * @param array $data
     * @param int $userId
     * @return Appointment
     * @throws \Exception
     */
    public function deleteWithAuth(int $appointmentId, array $data, int $userId): Appointment
    {
        $appointment = Appointment::findOrFail($appointmentId);

        if (!$this->appointmentBelongsToUser($appointment, $userId)) {
            throw new \Exception('You are not authorized to cancel this appointment.');
        }

        return $this->delete($appointment, $data);
    }

    /**
     * @param Appointment $appointment
     * @param array $data
     * @return Appointment
     * @throws \Exception
     */
    public function delete(Appointment $appointment, array $data): Appointment
    {
        DB::beginTransaction();

        try {
            $this->validateCancellation($appointment);

            $appointment->status = $data['status'] ?? AppointmentStatus::CancelledByPatient->value;

            if (isset($data['cancellation_reason'])) {
                $appointment->cancellation_reason = $data['cancellation_reason'];
            }

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
     * @param int $userId
     * @return bool
     */
    private function appointmentBelongsToUser(Appointment $appointment, int $userId): bool
    {
        $patient = Patient::where('user_id', $userId)->first();

        if (!$patient) {
            return false;
        }

        return $appointment->patient_id === $patient->id;
    }

    /**
     * @param Appointment $appointment
     * @return bool
     * @throws \Exception
     */
    private function validateCancellation(Appointment $appointment): bool
    {
        if (in_array($appointment->status, [
            AppointmentStatus::CancelledByPatient->value,
            AppointmentStatus::CancelledByClinic->value,
        ])) {
            throw new Exception('This appointment has already been cancelled.');
        }

        if ($appointment->status === AppointmentStatus::Completed->value) {
            throw new Exception('Completed appointments cannot be cancelled.');
        }

        $appointmentDate = Carbon::parse($appointment->appointment_date);
        $currentDate = Carbon::now();

        // Optional: Add siguro kwan daw ka limit sang pag cancel ka appointment

        return true;
    }
}
