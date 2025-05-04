<?php

namespace App\Services\Appointment;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use Illuminate\Support\Str;

class CreateServices
{
    /**
     * @param array $data
     * @return Appointment
     */
    public function create(array $data): Appointment
    {
        try {
            $preparedData = $this->prepareAppointmentData($data);
        } catch (\Exception $e) {
            throw $e;
        }

        $requiredKeys = ['doctor_id', 'appointment_date', 'patient_id', 'created_by_user_id'];
        foreach ($requiredKeys as $key) {
            if (!isset($preparedData[$key])) {
                throw new \Exception("The $key field is required.");
            }
        }

        DB::beginTransaction();

        try {
            $this->validateTimeSlot($preparedData['doctor_id'], $preparedData['appointment_date']);

            $appointment = new Appointment();
            $appointment->patient_id = $preparedData['patient_id'];
            $appointment->doctor_id = $preparedData['doctor_id'];
            $appointment->appointment_date = $preparedData['appointment_date'];
            $appointment->status = $preparedData['status'] ?? AppointmentStatus::Pending->value;
            $appointment->clinic_notes = $preparedData['notes'] ?? null;
            $appointment->created_by_user_id = $preparedData['created_by_user_id'];
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
     * @@param string $appointmentDate Full datetime string (YYYY-MM-DD HH:MM:SS)
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

        if (!isset($data['patient_id']) && Auth::check()) {
            $loggedInUserId = Auth::id();
            $patient = Patient::firstOrCreate(
                ['user_id' => $loggedInUserId],
                ['patient_identifier' => 'PAT-' . strtoupper(Str::random(8))]
            );

            $data['patient_id'] = $patient->id;
        }

        if (!isset($data['created_by_user_id']) && Auth::check()) {
            $data['created_by_user_id'] = Auth::id();
        }

        $preparedData = $data;

        return $preparedData;
    }
}
