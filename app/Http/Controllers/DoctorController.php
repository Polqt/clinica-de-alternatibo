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
            'specialization_id' => 'required|exists:specializations,id',
        ]);

        Doctor::create($data);

        return redirect()->route('admin.doctors')->with('success', 'Doctor created successfully.');
    }

    public function editDoctor(Request $request, $id) {
        $doctor = Doctor::findOrFail($id);

        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255|unique:doctors,license_number,' . $doctor->id,
            'specialization_id' => 'required|exists:specializations,id',
        ]);

        $doctor->update($data);

        return redirect()->route('admin.doctors')->with('success', 'Doctor updated successfully.');
    }

    public function deleteDoctor(Request $request, $id) {
        $doctor = Doctor::findOrFail($id);

        $doctor->delete();


        return redirect()->route('admin.doctors')->with('success', 'Doctor deleted successfully.');
    }
}
