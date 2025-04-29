<?php

namespace App\Services\Appointment;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class DeleteServices
{
    /**
     * @param Appointment $appointment
     * @param array $data
     * @return Appointment
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
        $currenDate = Carbon::now();

        return true;
    }
}
