<?php

namespace App\Http\Controllers;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminAppointmentController extends Controller
{
    public function confirmAppointment(Request $request, $id)
    {
        try {
            $appointment = Appointment::findOrFail($id);
            $appointment->status = AppointmentStatus::Confirmed->value;
            $appointment->save();

            return redirect()->route('admin.appointments')
                ->with('success', 'Appointment confirmed successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to confirm appointment: ' . $e->getMessage());
        }
    }

    public function cancelAppointment(Request $request, $id)
    {
        $request->validate([
            'cancellation_reason' => 'required|string|max:255',
        ]);

        try {
            $appointment = Appointment::findOrFail($id);
            $appointment->status = AppointmentStatus::CancelledByClinic->value;
            $appointment->cancellation_reason = $request->input('cancellation_reason');
            $appointment->save();

            return redirect()->route('admin.appointments')
                ->with('success', 'Appointment cancelled successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to cancel appointment: ' . $e->getMessage());
        }
    }

    public function completeAppointment(Request $request, $id)
    {
        $request->validate([
            'clinic_notes' => 'required|string|max:255',
        ]);

        try {
            $appointment = Appointment::findOrFail($id);

            $appointmentDate = Carbon::parse($appointment->appointment_date);
            $today = Carbon::today();

            if ($appointmentDate->isFuture()) {
                return back()->with('error', 'Cannot complete a future appointment.');
            }

            $appointment->status = AppointmentStatus::Completed->value;

            if ($request->has('clinic_notes')) {
                $appointment->clinic_notes = $request->input('clinic_notes');
            }

            $appointment->save();

            return redirect()->route('admin.appointments')
                ->with('success', 'Appointment completed successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to complete appointment: ' . $e->getMessage());
        }
    }

    public function rescheduleAppointment(Request $request, $id)
    {
        $request->validate([
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|string',
            'reschedule_reason' => 'nullable|string|max:255',
        ]);

        try {
            $appointment = Appointment::findOrFail($id);

            $newAppointmentDateTime = Carbon::parse($request->appointment_date . ' ' . $request->appointment_time);

            $existingAppointment = Appointment::where('doctor_id', $appointment->doctor_id)
                ->where('id', '!=', $id)
                ->where('appointment_date', $newAppointmentDateTime)
                ->where('status', '!=', AppointmentStatus::CancelledByClinic->value)
                ->where('status', '!=', AppointmentStatus::CancelledByPatient->value)
                ->first();

            if ($existingAppointment) {
                return back()->with('error', 'The selected time slot is already booked with another patient.');
            }

            $oldAppointmentDate = $appointment->appointment_date;

            $appointment->appointment_date = $newAppointmentDateTime;
            $appointment->status = AppointmentStatus::Rescheduled->value;

            if ($request->filled('reschedule_reason')) {
                $appointment->reschedule_reason = $request->reschedule_reason;
            }

            $appointment->save();

            return redirect()->route('admin.appointments')
                ->with('success', 'Appointment rescheduled successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to reschedule appointment: ' . $e->getMessage());
        }
    }

    public function getAppointmentDetails($id)
    {
        try {
            $appointment = Appointment::with(['patient.user', 'doctor.specialization'])->findOrFail($id);

            return response()->json([
                'success' => true,
                'status' => 'success',
                'data' => $appointment,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'status' => 'error',
                'message' => 'Failed to get appointment details: ' . $e->getMessage(),
            ], 404);
        }
    }
}
