<?php

namespace App\Services\Appointment;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use Illuminate\Support\Str;

class AvailabilityService
{
    /**
     * Get all possible time slots for appointments
     * 
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
     * Get available time slots for a doctor on a specific date
     * 
     * @param int $doctorId
     * @param string $date Date in Y-m-d format
     * @param int|null $excludeAppointmentId Appointment ID to exclude (for editing)
     * @return array
     */
    public function getAvailableTimeSlots(int $doctorId, string $date, ?int $excludeAppointmentId = null): array
    {
        // All possible time slots
        $allTimeSlots = $this->getAllTimeSlots();

        // Find already booked slots for this doctor on this date
        $bookedSlots = Appointment::where('doctor_id', $doctorId)
            ->whereDate('appointment_date', $date)
            ->whereNotIn('status', [
                AppointmentStatus::CancelledByClinic->value,
                AppointmentStatus::CancelledByPatient->value,
            ]);

        // If we're editing an appointment, exclude it from the booked slots
        if ($excludeAppointmentId) {
            $bookedSlots->where('id', '!=', $excludeAppointmentId);
        }

        // Get just the time portions of booked appointments
        $bookedTimes = $bookedSlots->get()
            ->pluck('appointment_date')
            ->map(function ($datetime) {
                return Carbon::parse($datetime)->format('H:i:s');
            })
            ->toArray();

        // Remove booked slots from all slots
        $availableSlots = array_diff_key($allTimeSlots, array_flip($bookedTimes));

        return $availableSlots;
    }

    /**
     * Validate if a specific time slot is available
     * 
     * @param int $doctorId
     * @param string $appointmentDateTime Full datetime string (Y-m-d H:i:s)
     * @param int|null $excludeAppointmentId Appointment ID to exclude (for editing)
     * @return bool
     */
    public function isTimeSlotAvailable(
        int $doctorId,
        string $appointmentDateTime,
        ?int $excludeAppointmentId = null
    ): bool {
        $date = Carbon::parse($appointmentDateTime);

        // Check if time is within office hours (9AM-5PM)
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
     * Validate appointment time slot before saving/updating
     * 
     * @param array $data Request data
     * @param int|null $appointmentId Appointment ID (for editing)
     * @return array [isValid, errorMessage]
     */
    public function validateAppointmentTimeSlot(array $data, ?int $appointmentId = null): array
    {
        $doctorId = $data['doctor_id'] ?? null;
        $appointmentDate = $data['appointment_date'] ?? null;
        $appointmentTime = $data['appointment_time'] ?? null;

        // Check if all required fields are present
        if (!$doctorId || !$appointmentDate || !$appointmentTime) {
            return [false, 'Doctor, date and time are required'];
        }

        // Create a Carbon instance from date and time
        $appointmentDateTime = Carbon::parse($appointmentDate . ' ' . $appointmentTime);

        // Check if date is in the past
        if ($appointmentDateTime->isPast()) {
            return [false, 'Cannot book appointments in the past'];
        }

        // Check if slot is available
        if (!$this->isTimeSlotAvailable((int)$doctorId, $appointmentDateTime->format('Y-m-d H:i:s'), $appointmentId)) {
            return [false, 'This time slot is not available. Please select another time.'];
        }

        return [true, ''];
    }
}
