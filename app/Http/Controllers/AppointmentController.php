<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Services\Appointment\CreateServices;
use App\Services\Appointment\DeleteServices;
use App\Services\Appointment\EditServices;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    // protected $createServices;
    // protected $editServices;
    // protected $deleteServices;

    // public function __construct(
    //     CreateServices $createServices,
    //     EditServices $editServices,
    //     DeleteServices $deleteServices,
    // ) {
    //     $this->createServices = $createServices;
    //     $this->editServices = $editServices;
    //     $this->deleteServices = $deleteServices;
    // }

    public function createAppointment(Request $request) {

        $doctors = Doctor::all();
        $data = $request->validate([
            
        ]);

        return view('admin.appointments.create', compact('doctors'));

    }

    public function editAppointment() {}

    public function deleteAppointment() {
        
    }
}
