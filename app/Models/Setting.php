<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = "settings";
    protected $fillable = [
        "id",
        "name",
        "description",
        "address",
        "phone",
        "email",
        "logo",
        "favicon",
        "facebook",
        "twitter",
        "instagram",
        "youtube",
        "tiktok"
    ];


}
