<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'gender',
        'birth_date',
        'complaint',
        'appointment_date',
        'appointment_time',
        'status',
    ];
}
