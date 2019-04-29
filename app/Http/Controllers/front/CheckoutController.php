<?php

namespace App\Http\Controllers\front;

use App\Address;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('front.checkout');
        }
        return redirect('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        Address::create($request->all());
        Order::createOrder();
    }
}
