<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class totalCart extends Model
{
    use HasFactory;
    protected $table = "totalCart";
    protected $fillable = [
        'id_cart',
        'id_payment',
        'orderTime',
        'address',
        'phoneNumber',
    ];
}
