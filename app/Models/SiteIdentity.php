<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteIdentity extends Model
{
    protected $fillable = ['logo','top_txt','address','shop_name','copyright'];
}
