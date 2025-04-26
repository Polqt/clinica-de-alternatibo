<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialization;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function doctors()
    {
        $totalDoctors = Doctor::count();
        $doctors = Doctor::with('specialization')->paginate(10);
        $specializations = Specialization::orderBy('name')->get();

        return view('admin.doctors.index', compact('doctors', 'totalDoctors', 'specializations'));
    }

    public function patients()
    {
        return view('admin.patients.index');
    }

    public function appointments()
    {
        return view('admin.appointments.index');
    }

    public function help()
    {
        return view('admin.help');
    }

    public function profile()
    {
        return view('admin.profile.index');
    }
}
