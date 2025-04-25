<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function createDoctor(Request $request) {

        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255|unique:doctors',
        ]);

        Doctor::create($data);

        return redirect()->route('admin.doctors')->with('success', 'Doctor created successfully.');
    }

    public function editDoctor($id) {}

    public function deleteDoctor($id) {
        $doctor = Doctor::findOrFail($id);

        $doctor->delete();


        return redirect()->route('admin.doctors')->with('success', 'Doctor deleted successfully.');
    }
}
