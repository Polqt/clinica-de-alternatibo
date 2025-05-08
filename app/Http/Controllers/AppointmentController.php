<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Services\Appointment\CreateServices;
use App\Services\Appointment\DeleteServices;
use App\Services\Appointment\EditServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    protected $createServices;
    protected $editServices;
    protected $deleteServices;

    public function __construct(
        CreateServices $createServices,
        EditServices $editServices,
        DeleteServices $deleteServices,
    ) {
        $this->createServices = $createServices;
        $this->editServices = $editServices;
        $this->deleteServices = $deleteServices;
    }

    public function showEditForm(Request $request)
    {
        $appointment_id = $request->appointment_id;
        $appointment = Appointment::with('doctor.specialization')->findOrFail($appointment_id);

        try {

            if ($appointment->appointment_date) {
                $date = Carbon::parse($appointment->appointment_date);
                $appointment->appointment_date = $date->format('Y-m-d');
                $appointment->appointment_time = $date->format('H:i:s');
            }

            $doctors = Doctor::with('specialization')->get();

            return view('client.schedule.edit', [
                'selectedAppointment' => $appointment,
                'doctors' => $doctors
            ]);
        } catch (\Exception $e) {
            return redirect()->route('client.schedule')->with('error', $e->getMessage());
        }
    }

    public function createAppointment(Request $request)
    {
        try {
            $data = $request->all();
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
            $userId = Auth::id();

            $this->editServices->updateWithAuth($appointmentId, $data, $userId);

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
            $userId = Auth::id();

            $this->deleteServices->deleteWithAuth($appointmentId, $data, $userId);

            return redirect()->route('client.schedule')->with('success', 'Appointment cancelled successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
