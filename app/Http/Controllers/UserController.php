<?php

namespace App\Http\Controllers;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Specialization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function dashboard()
    {
        $patient = Patient::where('user_id', Auth::id())->first();

        if (!$patient) {
            return view('client.dashboard', [
                'user' => Auth::user(),
                'totalVisits' => 0,
                'recentVisits' => collect(),
                'recentVisitsPercentage' => 0,
                'lastCheckup' => null,
                'daysSinceLastCheckup' => null,
                'upcomingAppointments' => 0,
                'nextAppointment' => null,
                'scheduleAppointments' => collect(),
                'preferredDoctors' => collect(),
                'recentSpecialties' => collect(),
            ]);
        }

        $appointments = Appointment::with(['doctor.specialization'])
            ->where('patient_id', $patient->id)
            ->where('status', AppointmentStatus::Completed->value)
            ->orderBy('appointment_date', 'desc')
            ->get();

        $totalVisits = $appointments->count();

        $recentVisits = $appointments->filter(function ($appointment) {
            return Carbon::parse($appointment->appointment_date)->isAfter(Carbon::now()->subDays(90));
        });

        $recentVisitsPercentage = $totalVisits > 0
            ? min(100, max(5, ($recentVisits->count() / $totalVisits) * 100))
            : 0;

        $lastAppointment = $appointments->first();
        $lastCheckup = $lastAppointment && Carbon::parse($lastAppointment->appointment_date)->isPast()
            ? Carbon::parse($lastAppointment->appointment_date)->format('M d, Y')
            : null;
        $daysSinceLastCheckup = $lastAppointment && Carbon::parse($lastAppointment->appointment_date)->isPast()
            ? abs(Carbon::parse($lastAppointment->appointment_date)->diffInDays(Carbon::now()))
            : null;

        $scheduleAppointments = Appointment::with(['doctor.specialization'])
            ->where('patient_id', $patient->id)
            ->whereIn('status', [
                AppointmentStatus::Scheduled->value,
                AppointmentStatus::Confirmed->value,
                AppointmentStatus::Rescheduled->value,
            ])
            ->where('appointment_date', '>=', Carbon::now())
            ->orderBy('appointment_date', 'asc')
            ->take(3)
            ->get();

        $upcomingAppointments = $scheduleAppointments->count();
        $nextAppointment = $scheduleAppointments->first()
            ? Carbon::parse($scheduleAppointments->first()->appointment_date)->format('M d, Y')
            : null;

        $preferredDoctors = DB::table('appointments')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
            ->select(
                'doctors.id',
                'doctors.first_name',
                'doctors.last_name',
                'specializations.name as specialization_name',
                DB::raw('COUNT(*) AS visit_count')
            )
            ->where('appointments.patient_id', $patient->id)
            ->groupBy('doctors.id', 'doctors.first_name', 'doctors.last_name', 'specializations.name')
            ->orderBy('visit_count', 'desc')
            ->limit(3)
            ->get();

        foreach ($preferredDoctors as $doctor) {
            $doctor->specialization = (object)['name' => $doctor->specialization_name];
        }

        $recentSpecialties = DB::table('appointments')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
            ->select(
                'specializations.id',
                'specializations.name',
                DB::raw('COUNT(*) as visit_count'),
                DB::raw('MAX(appointments.appointment_date) as last_visit')
            )
            ->where('appointments.patient_id', $patient->id)
            ->where('appointments.status', AppointmentStatus::Completed->value)
            ->groupBy('specializations.id', 'specializations.name')
            ->orderBy('last_visit', 'desc')
            ->limit(3)
            ->get();

        foreach ($recentSpecialties as $specialty) {
            $specialty->last_visit_date = Carbon::parse($specialty->last_visit)->format('M d, Y');
        }

        return view('client.dashboard', [
            'user' => Auth::user(),
            'totalVisits' => $totalVisits,
            'recentVisits' => $recentVisits,
            'recentVisitsPercentage' => $recentVisitsPercentage,
            'lastCheckup' => $lastCheckup,
            'daysSinceLastCheckup' => $daysSinceLastCheckup,
            'upcomingAppointments' => $upcomingAppointments,
            'nextAppointment' => $nextAppointment,
            'scheduleAppointments' => $scheduleAppointments,
            'preferredDoctors' => $preferredDoctors,
            'recentSpecialties' => $recentSpecialties,
        ]);
    }

    public function help()
    {
        return view('client.help');
    }

    public function profile()
    {
        /** @var User $user */
        $user = User::with('profile')->find(Auth::id());

        return view('client.profile.index', [
            'user' => $user
        ]);
    }

    public function schedule()
    {
        $doctors = Doctor::with('specialization')->get();

        $calendarEvents = [];
        $loggedInUserId = Auth::id();

        $patient = Patient::where('user_id', $loggedInUserId)->first();

        if ($patient) {
            $appointments = Appointment::with(['doctor.specialization'])
                ->where('patient_id', $patient->id)
                ->get();

            foreach ($appointments as $appointment) {
                $appointmentDateTime = new \DateTime($appointment->appointment_date);
                $backgroundColor = '#3b82f6';

                switch ($appointment->status) {
                    case AppointmentStatus::Scheduled->value:
                        $backgroundColor = '#3b82f6';
                        break;
                    case AppointmentStatus::Confirmed->value:
                        $backgroundColor = '#6366f1';
                        break;
                    case AppointmentStatus::Completed->value:
                        $backgroundColor = '#10b981';
                        break;
                    case AppointmentStatus::Rescheduled->value:
                        $backgroundColor = '#f59e0b';
                        break;
                    case AppointmentStatus::CancelledByClinic->value:
                    case AppointmentStatus::CancelledByPatient->value:
                        $backgroundColor = '#ef4444';
                        break;
                }

                $calendarEvents[] = [
                    'id' => $appointment->id,
                    'title' => 'Dr. ' . $appointment->doctor->last_name,
                    'start' => $appointmentDateTime->format('Y-m-d\TH:i:s'),
                    'borderColor' => $backgroundColor,
                    'textColor' => '#ffffff',
                    'extendedProps' => [
                        'doctor' => "Dr. {$appointment->doctor->first_name} {$appointment->doctor->last_name}",
                        'specialization' => $appointment->doctor->specialization->name ?? 'General Practice',
                        'status' => $appointment->status,
                        'notes' => $appointment->clinic_notes
                    ],
                ];
            }
        }

        return view('client.schedule.index', [
            'doctors' => $doctors,
            'calendarEvents' => json_encode($calendarEvents),
        ]);
    }

    public function history()
    {
        $patient = Patient::where('user_id', Auth::id())->first();

        if (!$patient) {
            return view('client.history.index', [
                'appointments' => collect(),
                'totalVisits' => 0,
                'recentVisits' => collect(),
                'recentVisitsPercentage' => 0,
                'lastCheckup' => null,
                'daysSinceLastCheckup' => null,
                'upcomingAppointments' => 0,
                'nextAppointment' => null,
                'scheduleAppointments' => collect(),
                'preferredDoctors' => collect(),
                'recentSpecialties' => collect(),
            ]);
        }

        $appointments = Appointment::with(['doctor.specialization'])
            ->where('patient_id', $patient->id)
            ->where('status', AppointmentStatus::Completed->value)
            ->orderBy('appointment_date', 'asc')
            ->get();

        $totalVisits = $appointments->count();

        $recentVisits = $appointments->filter(function ($appointment) {
            return Carbon::parse($appointment->appointment_date)->isAfter(Carbon::now()->subDays(90));
        });

        $recentVisitsPercentage = $totalVisits > 0
            ? min(100, max(5, ($recentVisits->count() / $totalVisits) * 100))
            : 0;

        $lastAppointment = $appointments->first();
        $lastCheckup = $lastAppointment && Carbon::parse($lastAppointment->appointment_date)->isPast()
            ? Carbon::parse($lastAppointment->appointment_date)->format('M d, Y')
            : null;
        $daysSinceLastCheckup = $lastAppointment && Carbon::parse($lastAppointment->appointment_date)->isPast()
            ? abs(Carbon::parse($lastAppointment->appointment_date)->diffInDays(Carbon::now()))
            : null;

        $scheduleAppointments = Appointment::with(['doctor.specialization'])
            ->where('patient_id', $patient->id)
            ->whereIn('status', [
                AppointmentStatus::Scheduled->value,
                AppointmentStatus::Confirmed->value,
                AppointmentStatus::Rescheduled->value,
            ])
            ->where('appointment_date', '>=', Carbon::now())
            ->orderBy('appointment_date', 'asc')
            ->take(3)
            ->get();

        $upcomingAppointments = $scheduleAppointments->count();
        $nextAppointment = $scheduleAppointments->first()
            ? Carbon::parse($scheduleAppointments->first()->appointment_date)->format('M d, Y')
            : null;

        foreach ($appointments as $appointment) {
            switch ($appointment->status) {
                case AppointmentStatus::Completed->value:
                    $appointment->status_color = 'green';
                    break;
                case AppointmentStatus::Confirmed->value:
                    $appointment->status_color = 'indigo';
                    break;
                case AppointmentStatus::Scheduled->value:
                    $appointment->status_color = 'blue';
                    break;
                case AppointmentStatus::Rescheduled->value:
                    $appointment->status_color = 'amber';
                    break;
                case AppointmentStatus::Pending->value:
                    $appointment->status_color = 'yellow';
                    break;
                default:
                    $appointment->status_color = 'gray';
                    break;
            }
        }

        $preferredDoctors = DB::table('appointments')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
            ->select(
                'doctors.id',
                'doctors.first_name',
                'doctors.last_name',
                'specializations.name as specialization_name',
                DB::raw('COUNT(*) AS visit_count')
            )
            ->where('appointments.patient_id', $patient->id)
            ->groupBy('doctors.id', 'doctors.first_name', 'doctors.last_name', 'specializations.name')
            ->orderBy('visit_count', 'asc')
            ->limit(3)
            ->get();

        foreach ($preferredDoctors as $doctor) {
            $doctor->specialization = (object)['name' => $doctor->specialization_name];
        }

        $recentSpecialties = DB::table('appointments')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
            ->select(
                'specializations.id',
                'specializations.name',
                DB::raw('COUNT(*) as visit_count'),
                DB::raw('MAX(appointments.appointment_date) as last_visit')
            )
            ->where('appointments.patient_id', $patient->id)
            ->where('appointments.status', AppointmentStatus::Completed->value)
            ->groupBy('specializations.id', 'specializations.name')
            ->orderBy('last_visit', 'asc')
            ->limit(3)
            ->get();

        foreach ($recentSpecialties as $specialty) {
            $specialty->last_visit_date = Carbon::parse($specialty->last_visit)->format('M d, Y');
        }

        return view('client.history.index', [
            'appointments' => $appointments->take(5),
            'totalVisits' => $totalVisits,
            'recentVisits' => $recentVisits,
            'recentVisitsPercentage' => $recentVisitsPercentage,
            'lastCheckup' => $lastCheckup,
            'daysSinceLastCheckup' => $daysSinceLastCheckup,
            'upcomingAppointments' => $upcomingAppointments,
            'nextAppointment' => $nextAppointment,
            'scheduleAppointments' => $scheduleAppointments,
            'preferredDoctors' => $preferredDoctors,
            'recentSpecialties' => $recentSpecialties,
        ]);
    }

    public function doctors()
    {
        $doctors = Doctor::with('specialization')->paginate(10);

        $specializations = Specialization::all();
        $specializationCount = Specialization::count();

        $totalDoctors = Doctor::count();

        return view('client.doctors.index', [
            'specializations' => $specializations,
            'specializationCount' => $specializationCount,
            'totalDoctors' => $totalDoctors,
            'doctors' => $doctors,
        ]);
    }
}
