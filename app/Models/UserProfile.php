<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'phone-number',
        'address',
        'postal_code',
        'city',
        'date_of_birth',
        'gender',
        'blood_type',
        'profile_picture'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
