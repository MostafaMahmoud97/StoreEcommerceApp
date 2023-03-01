<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "user_addresses";
    protected $fillable = [
        "id",
        "user_id",
        "address",
        "city",
        "state",
        "country",
        "postal_code",
        "phone"
    ];

    public function User(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
