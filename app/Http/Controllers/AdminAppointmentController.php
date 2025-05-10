<?php

namespace App\Http\Controllers;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Illuminate\Http\Request;

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
        try {
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
