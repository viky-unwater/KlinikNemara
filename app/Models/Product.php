<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table name if it differs from the default (optional)
    // protected $table = 'products';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'name',
        'stock',
        'price',
        'description',
        'skin_type',
    ];
    // Define relationship to orders (if necessary)
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id');
    }
}
