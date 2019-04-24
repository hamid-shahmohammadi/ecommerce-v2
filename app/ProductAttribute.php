<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable=['pa_name','pro_id','pat_id','price'];
}
