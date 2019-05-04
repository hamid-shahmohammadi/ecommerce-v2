<?php

namespace App\Http\Controllers\front;

use App\Address;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function payment(Address $address,Order $order)
    {
        if(Auth::check()){
            $user_id=Auth::user()->id;
            $address=Address::find($address->id);
            $order_id=$order->id;
            return view('front.payment',compact('address','order_id'));
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

        $order=Order::createOrder($address_id);
        return redirect('payment/'.$address_id.'/order/'.$order->id);
    }

    public function paymentSend(Request $request)
    {
        include_once(app_path('/inc/payIr.php'));
        $api = 'test';
        $amount = $request->input('amount');
        $mobile = "";
        $factorNumber = "";
        $description = "";
        $redirect = route('payment.verify');
        $result = sendPayIr($api, $amount, $redirect, $mobile, $factorNumber, $description);

        $result = json_decode($result);
//        dd($result->status);
        if($result->status) {
            $order=Order::find($request->input('order_id'));
            $order->token=$result->token;
            if($order->save()){
                $go = "https://pay.ir/pg/$result->token";
//            header("Location: $go");
                return redirect($go);
            }else{
                echo 'order token do not saved';
            }

        } else {
            echo $result->errorMessage;
        }
    }

    public function paymentVerify()
    {
//        return 'hi';
        include_once(app_path('/inc/payIr.php'));
        $api = 'test';
        $token = $_GET['token'];
        $result = json_decode(verifyPayIr($api,$token));
        if(isset($result->status)){
            if($result->status == 1){
                $order=Order::where('token',$token)->first();
                $order->status='success';
                if($order->save()){
                    echo "<h1>Success</h1>";
                }else{
                    echo 'order status do not success';
                }

            } else {
                echo "<h1>Failed</h1>";
            }
        } else {
            if($_GET['status'] == 0){
                echo "<h1>Failed</h1>";
            }
        }
    }
}
