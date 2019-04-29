<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable=['first_name','last_name','email','state','city','country','phone','company','user_id'];
}
