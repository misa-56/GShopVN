<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'content',
        'status',
        'payment_method',
        'order_key'

    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'customer_id', 'id');
    }
    public function get_order_number()
    {
        return '#' . str_pad($this->id, 8, "0", STR_PAD_LEFT);
    }
    // public function users()
    // {
    //     return $this->hasMany(User::class, 'email', 'email');
    // }
}
