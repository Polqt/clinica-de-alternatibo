<?php

namespace App\Enums;

enum AppointmentStatus: string
{
    case Scheduled = 'scheduled';
    case Confirmed = 'confirmed';
    case Pending = 'pending';
    case CancelledByPatient = 'cancelled_patient';
    case CancelledByClinic = 'cancelled_clinic';
    case Rescheduled = 'rescheduled';

    case Completed = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::Scheduled => 'Scheduled',
            self::Confirmed => 'Confirmed',
            self::Pending => 'Pending',
            self::CancelledByPatient => 'Cancelled (Patient)',
            self::CancelledByClinic => 'Cancelled (Clinic)',
            self::Rescheduled => 'Rescheduled',
            self::Completed => 'Completed',
        };
    }

    public function isCancelled(): bool{
        return in_array($this, [
            self::CancelledByPatient,
            self::CancelledByClinic,
        ]);
    }

}
