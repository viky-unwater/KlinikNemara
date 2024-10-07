<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan jika berbeda dengan nama model (opsional)
    protected $table = 'products';

    // Field yang boleh diisi
    protected $fillable = [
        'name', 'stock', 'price', 'description', 'skin_type'
    ];
}
