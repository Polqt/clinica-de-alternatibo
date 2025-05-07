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
        $appointments = Appointment::where('user_id', Auth::id())
            ->with('doctor.specialization')
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->get();

        $doctors = Doctor::with('specialization')->get();

        return view('client.schedule.index', compact('appointments', 'doctors'));
    }

    public function showEditForm(Appointment $appointment)
    {
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
            $appointment = $this->createServices->create($data);
            return redirect()->route('client.schedule')->with('success', 'Appointment created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function updateAppointment(Request $request, $id)
    {
        try {
            $appointment = Appointment::findOrFail($id);

            // Check if the appointment belongs to the logged-in user
            if ($appointment->user_id !== Auth::id()) {
                return back()->withErrors('You are not authorized to edit this appointment.');
            }

            $data = $request->all();
            $this->editServices->update($appointment, $data);

            return redirect()->route('client.schedule')->with('success', 'Appointment updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function deleteAppointment($id)
    {
        try {
            $appointment = Appointment::findOrFail($id);

            // Check if the appointment belongs to the logged-in user
            if ($appointment->user_id !== Auth::id()) {
                return back()->withErrors('You are not authorized to cancel this appointment.');
            }

            $this->deleteServices->delete($appointment, ['user_id' => Auth::id()]);

            return redirect()->route('client.schedule')->with('success', 'Appointment cancelled successfully.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
