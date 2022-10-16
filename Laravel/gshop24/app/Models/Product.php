<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'price',
        'price_sale',
        'featured',
        'stock',
        'active',
        'thumb',
        'account_email',
        'account_password',
        'product_code',
        'term'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name' => '']);
    }
    public function attribute()
    {
        return $this->hasMany(Attribute::class, 'product_id', 'id');
    }
    
}
