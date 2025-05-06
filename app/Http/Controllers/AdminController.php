<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Specialization;
use App\Models\User;

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
        $patients =  Patient::with('doctor')->paginate(10); 
        $totalPatients = Patient::count();
        return view('admin.patients.index', compact('patients'));
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

        $user = User::with('profile')->find(Auth::id());
        return view('admin.profile.index');
    }
}
