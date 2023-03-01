<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorSize extends Model
{
    use HasFactory;
    protected $table = "product_color_sizes";
    protected $fillable = [
        "id",
        'product_color_id',
        'product_size_id',
        'quantity',
        'in_stock',
        "price",
        "discount_price",
        "status"
    ];

    public function Images(){
        return $this->hasMany(ProductImage::class,"product_color_size_id","id");
    }
}
