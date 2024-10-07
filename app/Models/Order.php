<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Table name (optional, only if it's different from the plural form of the model name)
    protected $table = 'orders';

    // Fields that are mass assignable
    protected $fillable = [
        'name',
        'phone',
        'pickup_date',
        'pickup_time',
        'items',
        'status',   // Make sure the status field is fillable
        'created_at',
        'updated_at'
    ];

    // To cast 'items' as an array (JSON format) when retrieved from the database
    protected $casts = [
        'items' => 'array',
    ];

    // If there's a relationship between orders and products
    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
