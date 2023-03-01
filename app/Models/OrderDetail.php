<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "order_details";
    protected $fillable = [
        "id",
        'order_id',
        'product_color_size_id',
        "quantity",
        "price",
        "discount_price",
    ];


    public function Order(){
        return $this->belongsTo(Order::class,"order_id","id");
    }

    public function ProductColorSize(){
        return $this->belongsTo(ProductColorSize::class,"product_color_size_id","id");
    }

}
