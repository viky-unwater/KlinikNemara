<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan jika berbeda dengan nama model (opsional)
    protected $table = 'orders';

    // Field yang boleh diisi
    protected $fillable = [
        'name', 'phone', 'pickup_date', 'pickup_time', 'items'
    ];

    // Mengubah items menjadi array saat diambil dari database
    protected $casts = [
        'items' => 'array',
    ];
}
