<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable =['product_id','qty','price','user_ip','image','product_name'];
}
