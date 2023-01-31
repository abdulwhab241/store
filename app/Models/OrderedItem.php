<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderedItem extends Model
{
    use HasFactory;

    public $fillable = [
            "order_id",
            "product_id",
            "price",
            "quantity",
        ];
        public function product(){
            return $this->belongsTo(Product::class);
        }

        public function order(){
            return $this->belongsTo(Order::class);
        }
        public function user(){
            return $this->belongsTo(User::class);
        }
}
