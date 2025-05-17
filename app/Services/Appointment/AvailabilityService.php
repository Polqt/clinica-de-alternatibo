<?php

namespace App\Services\Appointment;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Carbon\Carbon;

class AvailabilityService
{
    /**
     * @return array
     */
    public function getAllTimeSlots(): array
    {
        return [
            '09:00:00' => '9:00 AM',
            '10:00:00' => '10:00 AM',
            '11:00:00' => '11:00 AM',
            '12:00:00' => '12:00 PM',
            '13:00:00' => '1:00 PM',
            '14:00:00' => '2:00 PM',
            '15:00:00' => '3:00 PM',
            '16:00:00' => '4:00 PM',
        ];
    }

    /**
     * @param int 
     * @param string 
     * @param int|null 
     * @return array
     */
    public function getAvailableTimeSlots(int $doctorId, string $date, ?int $excludeAppointmentId = null): array
    {
        $allTimeSlots = $this->getAllTimeSlots();

        $bookedSlots = Appointment::where('doctor_id', $doctorId)
            ->whereDate('appointment_date', $date)
            ->whereNotIn('status', [
                AppointmentStatus::CancelledByClinic->value,
                AppointmentStatus::CancelledByPatient->value,
            ]);

        if ($excludeAppointmentId) {
            $bookedSlots->where('id', '!=', $excludeAppointmentId);
        }

        $bookedTimes = $bookedSlots->get()
            ->pluck('appointment_date')
            ->map(function ($datetime) {
                return Carbon::parse($datetime)->format('H:i:s');
            })
            ->toArray();

        $availableSlots = array_diff_key($allTimeSlots, array_flip($bookedTimes));

        return $availableSlots;
    }

    /**
     * @param int 
     * @param string 
     * @param int|null 
     * @return bool
     */
    public function isTimeSlotAvailable(
        int $doctorId,
        string $appointmentDateTime,
        ?int $excludeAppointmentId = null
    ): bool {
        $date = Carbon::parse($appointmentDateTime);

        $hour = (int) $date->format('H');
        if ($hour < 9 || $hour >= 17) {
            return false;
        }

        $query = Appointment::where('doctor_id', $doctorId)
            ->where('appointment_date', $date->format('Y-m-d H:i:s'))
            ->whereNotIn('status', [
                AppointmentStatus::CancelledByClinic->value,
                AppointmentStatus::CancelledByPatient->value,
            ]);

        if ($excludeAppointmentId) {
            $query->where('id', '!=', $excludeAppointmentId);
        }

        return !$query->exists();
    }

    /**
     * @param array
     * @param int|null 
     * @return array 
     */
    public function validateAppointmentTimeSlot(array $data, ?int $appointmentId = null): array
    {
        $doctorId = $data['doctor_id'] ?? null;
        $appointmentDate = $data['appointment_date'] ?? null;
        $appointmentTime = $data['appointment_time'] ?? null;

        if (!$doctorId || !$appointmentDate || !$appointmentTime) {
            return [false, 'Doctor, date and time are required'];
        }

        $appointmentDateTime = Carbon::parse($appointmentDate . ' ' . $appointmentTime);

        if ($appointmentDateTime->isPast()) {
            return [false, 'Cannot book appointments in the past'];
        }

        if (!$this->isTimeSlotAvailable((int)$doctorId, $appointmentDateTime->format('Y-m-d H:i:s'), $appointmentId)) {
            return [false, 'This time slot is not available. Please select another time.'];
        }

        return [true, ''];
    }
}
