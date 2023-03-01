<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $table = "product_sizes";
    protected $fillable = [
        "id",
        'product_id',
        "size"
    ];

    public function ProductColorSizes(){
        return $this->belongsToMany(ProductColorSize::class,"product_color_sizes","product_size_id","product_color_id","id","id");
    }
}
