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

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }
}
