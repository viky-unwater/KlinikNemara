<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'treatment_name',
        'reservation_date',
        'status',
    ];

    // If you want to define a relationship with Treatment model, uncomment below
    /*
    public function treatment()
    {
        return $this->belongsTo(Treatment::class, 'treatment_name', 'name');
    }
    */
}
