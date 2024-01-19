<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'street',
        'postal_code',
        'city',
        'total',
        'status',
        'items',
    ];

    protected $casts = [
        'items' => 'json',
    ];
}
