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
        return view('admin.doctors');
    }

    public function patients()
    {
        return view('admin.patients');
    }

    public function appointments()
    {
        return view('admin.appointments');
    }

    public function help()
    {
        return view('admin.help');
    }
}
