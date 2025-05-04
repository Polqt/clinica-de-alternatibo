<?php

namespace App\Http\Controllers;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {


        return view('client.dashboard');
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
        return view('client.history.index');
    }

    public function appointments()
    {
        return view('client.appointments.index');
    }
}
