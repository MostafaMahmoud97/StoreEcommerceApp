<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "products";
    protected $fillable = [
        "id",
        "category_id",
        "name",
        "description",
        "image",
        "price",
        "discount_price"
    ];

    public function Category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }

    public function ProductColors(){
        return $this->hasMany(ProductColor::class,"product_id","id");
    }
}
