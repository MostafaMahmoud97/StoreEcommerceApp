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
        'product_color_size_id',
        "image"
    ];

    public function ProductColorSize(){
        return $this->belongsTo(ProductColorSize::class,"product_color_size_id","id");
    }
}
