<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    public $fillable = ["product_id","quantity","user_id"];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
