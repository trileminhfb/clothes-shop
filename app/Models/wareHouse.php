<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wareHouse extends Model
{
    use HasFactory;
    protected $table = "wareHouse";
    protected $fillable = [
        'id_product',
        'quantity',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_product');
    }
}
