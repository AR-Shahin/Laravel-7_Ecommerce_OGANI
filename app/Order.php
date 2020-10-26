<?php

namespace App;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_ip', 'product_id', 'quantity','price','status','coupon_name',
    ];
 public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
 	 	 	 	 	