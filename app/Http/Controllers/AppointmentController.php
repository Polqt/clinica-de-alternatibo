<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Services\Appointment\CreateServices;
use App\Services\Appointment\DeleteServices;
use App\Services\Appointment\EditServices;
use Illuminate\Http\Request;

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

    public function createSchedule(Request $request)
    {
        $data = $request->all(); 

        $this->createServices->create($data);
        return redirect()->route('client.schedule')->with('success', 'Appointment created successfully.');
    }

    public function editAppointment(Appointment $appointment, $data)
    {
        $this->editServices->update($appointment, $data);
        return redirect()->route('client.appointment.edit')->with('success', 'Appointment updated successfully.');
    }

    public function deleteAppointment(Appointment $appointment, $data)
    {
        $this->deleteServices->delete($appointment, $data);
        return redirect()->route('client.appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
