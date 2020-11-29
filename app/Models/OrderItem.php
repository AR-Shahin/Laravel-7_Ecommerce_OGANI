<?php

namespace App\Models;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable =['admin_id','product_id','trans_id','coupon','qty','status'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
