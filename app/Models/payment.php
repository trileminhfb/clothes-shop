<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "payment";
    protected $fillable = [
        'namePaymentMethod',
        'status',
    ];

    public function totalCarts()
    {
        return $this->hasMany(TotalCart::class, 'id_payment');
    }
}
