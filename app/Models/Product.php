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

    public function ProductColorSizes(){
        return $this->hasMany(ProductColorSize::class,"product_id","id");
    }

    public function ProductColors(){
        return $this->hasMany(ProductColorSize::class,"product_id","id")->select('product_id','product_color_id')->where('status',1)->distinct('product_color_id')->with('ProductColor');
    }

    public function ProductSizes(){
        return $this->hasMany(ProductColorSize::class,"product_id","id")->select('product_id','product_size_id')->where('status',1)->distinct('product_size_id')->with('ProductSize');
    }

    public function Images(){
        return $this->hasMany(ProductImage::class,"product_id","id");
    }

}
