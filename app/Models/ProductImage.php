<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = "product_images";
    protected $fillable = [
        "id",
        'product_id',
        "image"
    ];

    public function Product(){
        return $this->belongsTo(Product::class,"product_id","id");
    }
}
