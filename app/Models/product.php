<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'quantity',
        'status',
        'id_category',
        'id_brand',
        'gender',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_product');
    }

    public function wareHouse()
    {
        return $this->belongsTo(WareHouse::class, 'id_product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }
}
