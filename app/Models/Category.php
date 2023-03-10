<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory,NodeTrait,SoftDeletes;
    protected $table = "categories";
    protected $fillable = [
        "id",
        "parent_id",
        "_lft",
        "_rgt",
        "name",
        "img"
    ];

    public function Products(){
        return $this->hasMany(Product::class,"category_id","id");
    }
}
