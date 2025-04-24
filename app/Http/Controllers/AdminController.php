<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function doctors()
    {
        $doctors = Doctor::paginate(10);

        return view('admin.doctors.index', compact('doctors'));
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
