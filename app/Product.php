<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['pro_name','pro_code','pro_price','pro_info','stock','category_id','image','spl_price'];
}
