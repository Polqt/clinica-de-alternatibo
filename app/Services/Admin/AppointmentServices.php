<?php

namespace App\Services\Admin;

use App\Models\Appointment;
use App\Enums\AppointmentStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AppointmentServices
{
    /**
     * Get all appointments with filtering options
     *
     * @param array $filters
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllAppointments(array $filters = [])
    {
        $query = Appointment::with(['doctor.specialization', 'patient.user.profile'])
            ->orderBy('appointment_date', 'desc');

        // Apply status filter
        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        // Apply date range filter
        if (!empty($filters['date_range'])) {
            switch ($filters['date_range']) {
                case 'today':
                    $query->whereDate('appointment_date', today());
                    break;
                case 'this_week':
                    $query->whereBetween('appointment_date', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'this_month':
                    $query->whereBetween('appointment_date', [now()->startOfMonth(), now()->endOfMonth()]);
                    break;
            }
        }

        // Apply doctor filter
        if (!empty($filters['doctor_id'])) {
            $query->where('doctor_id', $filters['doctor_id']);
        }

        // Apply search term
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->whereHas('patient.user', function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
            })->orWhereHas('doctor', function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
            });
        }

        return $query->paginate(10);
    }

    /**
     * Confirm an appointment
     *
     * @param int $appointmentId
     * @return bool
     */
    public function confirmAppointment(int $appointmentId)
    {
        try {
            $appointment = Appointment::findOrFail($appointmentId);

            if ($appointment->status === AppointmentStatus::Pending->value) {
                $appointment->status = AppointmentStatus::Confirmed->value;
                $appointment->save();

                // TODO: Add notification to patient about confirmed appointment

                return true;
            }

            return false;
        } catch (\Exception $e) {
            Log::error('Error confirming appointment: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Cancel an appointment by the clinic
     *
     * @param int $appointmentId
     * @param string|null $reason
     * @return bool
     */
    public function cancelAppointment(int $appointmentId, ?string $reason = null)
    {
        try {
            $appointment = Appointment::findOrFail($appointmentId);

            // Only cancel if it's not already completed or cancelled
            if (!in_array($appointment->status, [
                AppointmentStatus::Completed->value,
                AppointmentStatus::CancelledByPatient->value,
                AppointmentStatus::CancelledByClinic->value,
            ])) {
                $appointment->status = AppointmentStatus::CancelledByClinic->value;
                $appointment->cancellation_reason = $reason;
                $appointment->save();

                // TODO: Add notification to patient about cancelled appointment

                return true;
            }

            return false;
        } catch (\Exception $e) {
            Log::error('Error cancelling appointment: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Complete an appointment
     *
     * @param int $appointmentId
     * @param string|null $notes
     * @return bool
     */
    public function completeAppointment(int $appointmentId, ?string $notes = null)
    {
        try {
            $appointment = Appointment::findOrFail($appointmentId);

            if (in_array($appointment->status, [
                AppointmentStatus::Confirmed->value,
                AppointmentStatus::Scheduled->value,
            ])) {
                $appointment->status = AppointmentStatus::Completed->value;

                if ($notes) {
                    $appointment->clinic_notes = $notes;
                }

                $appointment->save();
                return true;
            }

            return false;
        } catch (\Exception $e) {
            Log::error('Error completing appointment: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get appointment statistics for dashboard
     *
     * @return array
     */
    public function getAppointmentStats()
    {
        $stats = [
            'total' => Appointment::count(),
            'pending' => Appointment::where('status', AppointmentStatus::Pending->value)->count(),
            'confirmed' => Appointment::where('status', AppointmentStatus::Confirmed->value)->count(),
            'completed' => Appointment::where('status', AppointmentStatus::Completed->value)->count(),
            'cancelled' => Appointment::whereIn('status', [
                AppointmentStatus::CancelledByPatient->value,
                AppointmentStatus::CancelledByClinic->value,
            ])->count(),
        ];

        return $stats;
    }
}
