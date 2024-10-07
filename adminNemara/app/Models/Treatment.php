<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'gender',
        'birth_date',
        'last_facial',
        'treatment_type',
        'needs_consultation',
        'appointment_date',
        'appointment_time',
    ];
}
