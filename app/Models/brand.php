<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    protected $table = "brand";
    protected $fillable = [
        'nameBrand',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_brand');
    }
}
