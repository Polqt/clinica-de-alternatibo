<?php

namespace App\Http\Controllers;

use App\Services\Appointment\CreateServices;
use App\Services\Appointment\DeleteServices;
use App\Services\Appointment\EditServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Appointment\AvailabilityService;
use Devrabiul\ToastMagic\Facades\ToastMagic;

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
            ToastMagic::success('Appointment scheduled successfully!');

            return redirect()->back();
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

            if (!$request->appointment_id) {
                return redirect()->back()->with('error', 'No appointment selected. Please select an appointment first.');
            }

            $this->editServices->updateWithAuth($appointmentId, $data);

            ToastMagic::success('Appointment updated successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteAppointment(Request $request)
    {
        try {
            $appointmentId = $request->input('appointment_id');

            if (!$request->appointment_id) {
                return redirect()->back()->with('error', 'No appointment selected. Please select an appointment first.');
            }

            $data = ['user_id' => Auth::id()];

            $this->deleteServices->deleteWithAuth((int) $appointmentId, $data);

            ToastMagic::success('Appointment cancelled successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
