<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function doctors()
    {
        return view('admin.doctors.index');
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
