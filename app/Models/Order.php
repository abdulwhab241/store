<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id', 
        'cart_id', 
        'first_name', 
        'last_name', 
        'company_name', 
        'address',
        'address_number',
        'city',
        'area',
        'phone',
        'payment_method',
        'order_notice'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
}
