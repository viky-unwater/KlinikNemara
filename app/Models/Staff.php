<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'role', 'password',
    ];

    protected $hidden = [
        'password',
    ];
}
