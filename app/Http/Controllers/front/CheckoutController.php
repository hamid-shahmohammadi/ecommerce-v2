<?php

namespace App\Http\Controllers\front;

use App\Address;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function payment(Address $address)
    {
        if(Auth::check()){
            $user_id=Auth::user()->id;
            $address=Address::find($address->id);
            return view('front.payment',compact('address'));
        }
        return redirect('login');
    }

    public function store(Request $request)
    {
        if ($request->has('new')){
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
            $address=Address::create($request->all());
            $address_id=$address->id;
        }elseif($request->has('address_id')){
            $address_id=$request->input('address_id');
        }

        Order::createOrder($address_id);
        return redirect('payment/'.$address_id);
    }
}
