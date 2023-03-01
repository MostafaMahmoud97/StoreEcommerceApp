<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        "id",
        "user_id",
        "status",
        "payment_method",
        "payment_status",
        "payment_id",
        "total_price",
        "address",
        "phone",
        "email",
        "name",
        "surname",
        "city",
        "postal_code",
        "country",
        "state",
        "shipping_price"
    ];

    public function User(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function OrderDetails(){
        return $this->hasMany(OrderDetail::class,"order_id","id");
    }
}
