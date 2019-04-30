<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable=['total','status','user_id','address_id'];

    public function products() {
        return $this->belongsToMany('App\Product')->withPivot(['qty', 'total']);
    }
    public static function createOrder($address_id)
    {
        $total=0;
        $user = Auth::user();
        $carts=$cart = session()->get('cart');

        foreach ($carts as $cart){
            $total+=$cart['price']*$cart['qty'];
        }
        $order = $user->orders()->create(['total' => $total, 'status' => 'pending','address_id'=>$address_id]);

        foreach ($carts as $id=>$cart) {
            $order->products()->attach($id, ['qty' => $cart['qty'], 'tax' => 0, 'total' => $cart['price']*$cart['qty']]);
        }
    }
}
