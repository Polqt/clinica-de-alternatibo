<?php

namespace App\Http\Controllers;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Specialization;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalAppointments = Appointment::count();

        return view('admin.dashboard',[
            'totalAppointments' => $totalAppointments,
        ]);
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
        $patients =  Patient::with([
            'user' => function ($query) {
                $query->with('profile');
            },
            'doctor' => function ($query) {
                $query->with(['doctor' => function ($q) {
                    $q->with('specialization');
                }])->latest('appointment_date')->limit(1);
            },
            'appointments' => function ($query) {
                $query->with('doctor')->latest('appointment_date');
            }
        ])->paginate(10);

        $patients->getCollection()->transform(function ($patient) {
            $patient->latestAppointment = $patient->appointments->first();
            return $patient;
        });

        $totalPatients = Patient::count();

        $startOfMonth = Carbon::now()->startOfMonth();
        $newPatients = Patient::where('created_at', '>=', $startOfMonth)->count();


        $today = Carbon::today();
        $appointmentsToday = Appointment::whereDate('appointment_date', $today)->count();

        $previousMonth = Carbon::now()->subMonth()->startOfMonth();
        $previousMonthEnd = Carbon::now()->subMonth()->endOfMonth();
        $previousMonthPatients = Patient::whereBetween('created_at', [$previousMonth, $previousMonthEnd])->count();

        $newPatientsGrowth = $previousMonthPatients > 0
            ? round(($newPatients - $previousMonthPatients) / $previousMonthPatients * 100, 1)
            : 100;

        $activeCases = Patient::whereHas('appointments', function ($query) {
            $query->where('status', 'active');
        })->count();


        return view('admin.patients.index', [
            'patients' => $patients,
            'totalPatients' => $totalPatients,
            'newPatients' => $newPatients,
            'newPatientsGrowth' => $newPatientsGrowth,
            'appointmentsToday' => $appointmentsToday,
            'activeCases' => $activeCases,
        ]);
    }

    public function appointments()
    {
        $appointments = Appointment::with(['patient.user.profile', 'doctor.specialization'])
            ->orderBy('appointment_date', 'asc')
            ->paginate(10);

        $statusCounts = [
            'all' => Appointment::count(),
            'pending' => Appointment::where('status', AppointmentStatus::Pending->value)->count(),
            'confirmed' => Appointment::where('status', AppointmentStatus::Confirmed->value)->count(),
            'completed' => Appointment::where('status', AppointmentStatus::Completed->value)->count(),
            'cancelled' => Appointment::whereIn('status', [
                AppointmentStatus::CancelledByClinic->value,
                AppointmentStatus::CancelledByPatient->value,
            ])->count(),
        ];

        $doctors = Doctor::with('specialization')->get();

        return view('admin.appointments.index', [
            'appointments' => $appointments,
            'statusCounts' => $statusCounts,
            'doctors' => $doctors,
        ]);
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
