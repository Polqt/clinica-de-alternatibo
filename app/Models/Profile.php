<?php

namespace App\Models;

use App\Enums\BloodType;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
        'postal_code',
        'city',
        'date_of_birth',
        'gender',
        'blood_type',
        'profile_picture'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'blood_type' => BloodType::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
