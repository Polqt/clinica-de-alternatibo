<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'patient_identifier'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
