<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function getDoctor()
    {
        return Doctor::all();
    }
    
    public function createDoctor() {}

    public function doctorDetails($id) {}

    public function editDoctor($id) {}

    public function deleteDoctor($id) {}
}
