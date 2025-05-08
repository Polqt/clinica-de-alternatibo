<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Services\Appointment\CreateServices;
use App\Services\Appointment\DeleteServices;
use App\Services\Appointment\EditServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function index()
    {
        $user = Auth::user();
        $appointments = Appointment::where('user_id', $user->id)
            ->with('doctor.specialization')
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->get();

        $doctors = Doctor::with('specialization')->get();

        // Format appointments for calendar display
        $calendarEvents = $appointments->map(function ($appointment) {
            $appointmentDateTime = $appointment->appointment_date . ' ' . $appointment->appointment_time;
            return [
                'id' => $appointment->id,
                'title' => 'Dr. ' . $appointment->doctor->last_name,
                'start' => $appointmentDateTime,
                'doctor' => 'Dr. ' . $appointment->doctor->first_name . ' ' . $appointment->doctor->last_name,
                'doctor_id' => $appointment->doctor_id,
                'specialization' => $appointment->doctor->specialization->name,
                'status' => $appointment->status,
                'notes' => $appointment->notes,
            ];
        })->toJson();

        return view('client.schedule.index', compact('appointments', 'doctors', 'calendarEvents'));
    }

    public function showEditForm(Request $request)
    {
        $appointment_id = $request->appointment_id;
        $appointment = Appointment::with('doctor.specialization')->findOrFail($appointment_id);

        // Check if appointment belongs to user
        if ($appointment->user_id !== Auth::id()) {
            return redirect()->route('client.schedule')->with('error', 'Unauthorized access.');
        }

        $doctors = Doctor::with('specialization')->get();

        return view('client.schedule.edit', [
            'selectedAppointment' => $appointment,
            'doctors' => $doctors
        ]);
    }

    public function createAppointment(Request $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::id(); // Add the user ID to data

            $appointment = $this->createServices->create($data);
            return redirect()->route('client.schedule')->with('success', 'Appointment created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function updateAppointment(Request $request)
    {
        try {
            $appointment_id = $request->input('appointment_id');
            $appointment = Appointment::findOrFail($appointment_id);

            // Check if the appointment belongs to the logged-in user
            if ($appointment->user_id !== Auth::id()) {
                return back()->with('error', 'You are not authorized to edit this appointment.');
            }

            $data = $request->all();
            $this->editServices->update($appointment, $data);

            return redirect()->route('client.schedule')->with('success', 'Appointment updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteAppointment(Request $request)
    {
        try {
            $appointment_id = $request->input('appointment_id');
            $appointment = Appointment::findOrFail($appointment_id);

            // Check if the appointment belongs to the logged-in user
            if ($appointment->user_id !== Auth::id()) {
                return back()->with('error', 'You are not authorized to cancel this appointment.');
            }

            $this->deleteServices->delete($appointment, ['user_id' => Auth::id()]);

            return redirect()->route('client.schedule')->with('success', 'Appointment cancelled successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
