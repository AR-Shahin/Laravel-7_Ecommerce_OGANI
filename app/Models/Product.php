<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['product_name','slug','cat_id','brand_id','price','status','quantity','count','main_image','short_des','long_des'];

    public function category()
    {
        return $this->hasOne('App\Models\Category','id','cat_id');
    }
    public function brand()
    {
        return $this->hasOne('App\Models\Brand','id','brand_id');
    }
}
