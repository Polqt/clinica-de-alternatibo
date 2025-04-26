<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Specialization;

class Doctor extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'license_number',
        'specialization_id',
    ];

    public function specialization() {
        return $this->belongsTo(Specialization::class);
    }

    // public function patients()
    // {
    //     return $this->hasMany(Patient::class);
    // }


}
