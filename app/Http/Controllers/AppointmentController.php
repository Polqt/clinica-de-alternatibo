<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Services\Appointment\CreateServices;
use App\Services\Appointment\DeleteServices;
use App\Services\Appointment\EditServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Appointment\AvailabilityService;

class AppointmentController extends Controller
{
    protected $createServices;
    protected $editServices;
    protected $deleteServices;
    protected $availabilityService;

    public function __construct(
        CreateServices $createServices,
        EditServices $editServices,
        DeleteServices $deleteServices,
        AvailabilityService $availabilityService
    ) {
        $this->createServices = $createServices;
        $this->editServices = $editServices;
        $this->deleteServices = $deleteServices;
        $this->availabilityService = $availabilityService;
    }

    public function createAppointment(Request $request)
    {
        try {
            $data = $request->all();

            [$isValid, $errorMessage] = $this->availabilityService->validateAppointmentTimeSlot($data);
            if (!$isValid) {
                return back()->withErrors($errorMessage)->withInput();
            }

            $data['created_by_user_id'] = Auth::id();
            $appointment = $this->createServices->create($data);
            return redirect()->route('client.schedule')->with('success', 'Appointment created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function updateAppointment(Request $request)
    {
        try {
            $appointmentId = $request->input('appointment_id');
            $data = $request->all();

            [$isValid, $errorMessage] = $this->availabilityService->validateAppointmentTimeSlot(
                $data,
                (int)$appointmentId
            );

            if (!$isValid) {
                return back()->withErrors($errorMessage)->withInput();
            }

            $this->editServices->updateWithAuth($appointmentId, $data);

            return redirect()->route('client.schedule')->with('success', 'Appointment updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteAppointment(Request $request)
    {
        try {
            $appointmentId = $request->input('appointment_id');
            $data = ['user_id' => Auth::id()];

            $this->deleteServices->deleteWithAuth($appointmentId, $data);

            return redirect()->route('client.schedule')->with('success', 'Appointment cancelled successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Get available time slots for a doctor on a specific date
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAvailableTimeSlots(Request $request)
    {
        try {
            $doctorId = $request->input('doctor_id');
            $date = $request->input('date');
            $appointmentId = $request->input('appointment_id', null);

            if (!$doctorId || !$date) {
                return response()->json(['error' => 'Doctor ID and date are required'], 400);
            }

            $availableSlots = $this->availabilityService->getAvailableTimeSlots(
                (int)$doctorId,
                $date,
                $appointmentId ? (int)$appointmentId : null
            );

            return response()->json([
                'available_slots' => $availableSlots
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Check if a specific time slot is available
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkTimeSlotAvailability(Request $request)
    {
        try {
            $doctorId = $request->input('doctor_id');
            $date = $request->input('date');
            $time = $request->input('time');
            $appointmentId = $request->input('appointment_id', null);

            if (!$doctorId || !$date || !$time) {
                return response()->json(['error' => 'Doctor ID, date and time are required'], 400);
            }

            // Combine date and time
            $appointmentDateTime = $date . ' ' . $time;

            $isAvailable = $this->availabilityService->isTimeSlotAvailable(
                (int)$doctorId,
                $appointmentDateTime,
                $appointmentId ? (int)$appointmentId : null
            );

            return response()->json([
                'is_available' => $isAvailable
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
