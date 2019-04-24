<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['pro_name','pro_slug','pro_code','pro_price','pro_info','stock','category_id','image','spl_price'];

    public function diffTime()
    {
        $mins=Carbon::now()->diffInMinutes($this->created_at);
        if($mins > 60){
            $hour=round($mins/60);
            return $hour.' hour';
        }
        return $mins.' min';
    }
}
