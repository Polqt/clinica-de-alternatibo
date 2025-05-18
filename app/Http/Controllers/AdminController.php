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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalAppointments = Appointment::count();
        $pendingAppointments = Appointment::where('status', AppointmentStatus::Pending->value)->count();
        $totalPatients = Patient::count();
        $totalDoctors = Doctor::count();

        $approvalQueue = Appointment::where('status', AppointmentStatus::Pending->value)
            ->with(['patient.user.profile', 'doctor.specialization'])
            ->orderBy('appointment_date', 'asc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', [
            'totalAppointments' => $totalAppointments,
            'pendingAppointments' => $pendingAppointments,
            'totalPatients' => $totalPatients,
            'totalDoctors' => $totalDoctors,
            'approvalQueue' => $approvalQueue,
        ]);
    }

    public function doctors(Request $request)
    {
        if ($request->has('page') && $request->input('page') == 1) {
            return redirect()->route('admin.doctors');
        }

        $query = Doctor::with('specialization');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('license_number', 'like', "%{$search}%");
            });
        }

        switch ($request->input('sort')) {
            case 'name_asc':
                $query->orderBy('first_name')->orderBy('last_name');
                break;
            case 'license':
                $query->orderBy('license_number');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->orderBy('first_name');
        }

        $totalDoctors = Doctor::count();
        $doctors = $query->paginate(10);
        $specializations = Specialization::orderBy('name')->get();

        return view('admin.doctors.index', compact('doctors', 'totalDoctors', 'specializations'));
    }

    public function patients(Request $request)
    {
        if ($request->has('page') && $request->input('page') == 1) {
            return redirect()->route('admin.patients.index');
        }

        $search = $request->input('search');
        $bloodType = $request->input('blood_type');
        $gender = $request->input('gender');

        $query = Patient::with([
            'user' => function ($query) {
                $query->with('profile');
            },
            'appointments' => function ($query) {
                $query->latest('appointment_date');
            }
        ]);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('patient_identifier', 'like', "%{$search}%");
                $q->orWhereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', "%{$search}%");
                });
            });
        }

        if ($bloodType) {
            $query->whereHas('user.profile', function ($q) use ($bloodType) {
                $q->where('blood_type', $bloodType);
            });
        }

        if ($gender) {
            $query->whereHas('user.profile', function ($q) use ($gender) {
                $q->where('gender', $gender);
            });
        }

        $patients = $query->paginate(10)->withQueryString();

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

        $bloodTypes = \App\Enums\BloodType::values();

        $genders = ['male', 'female', 'other'];

        return view('admin.patients.index', [
            'patients' => $patients,
            'totalPatients' => $totalPatients,
            'newPatients' => $newPatients,
            'newPatientsGrowth' => $newPatientsGrowth,
            'appointmentsToday' => $appointmentsToday,
            'activeCases' => $activeCases,
            'search' => $search,
            'bloodTypes' => $bloodTypes,
            'genders' => $genders,
            'selectedBloodType' => $bloodType,
            'selectedGender' => $gender,
        ]);
    }

    public function appointments(Request $request)
    {
        $status = $request->query('status');

        $query = Appointment::with(['patient.user.profile', 'doctor.specialization']);

        if ($status) {
            if ($status === 'cancelled') {
                $query->whereIn('status', [
                    AppointmentStatus::CancelledByClinic->value,
                    AppointmentStatus::CancelledByPatient->value,
                ]);
            } else {
                $statusValue = match ($status) {
                    'pending' => AppointmentStatus::Pending->value,
                    'confirmed' => AppointmentStatus::Confirmed->value,
                    'completed' => AppointmentStatus::Completed->value,
                    default => null,
                };
                if ($statusValue) {
                    $query->where('status', $statusValue);
                }
            }
        }

        $appointments = $query->orderBy('appointment_date', 'asc')->paginate(10)->withQueryString();

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
