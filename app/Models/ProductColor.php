<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = "product_colors";
    protected $fillable = [
        "id",
        'product_id',
        "color"
    ];

    public function Product(){
        return $this->belongsTo(Product::class,"product_id","id");
    }

    public function ProductColorSizes(){
        return $this->belongsToMany(ProductColorSize::class,"product_color_sizes","product_color_id","product_size_id","id","id");
    }
}
