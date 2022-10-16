<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'term',
        'price',
        'price_sale',
        'qty'

    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
