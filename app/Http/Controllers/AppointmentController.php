<?php

namespace App\Http\Controllers;

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
}
