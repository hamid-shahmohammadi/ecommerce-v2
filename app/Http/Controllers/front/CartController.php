<?php

namespace App\Http\Controllers\front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $product=$request->input('product');
        $id=$product['id'];
        $productFind = Product::find($id);
        if(!$productFind) {
            abort(404);
        }
        $qty=$request->input('qty');

        $cart=session()->get('cart');

        if(isset($cart[$id])){
            $cart[$id]['qty']++;
            session()->put('cart',$cart);
        }

        if(!$cart){
            $cart=[
                $id=>[
                    'name'=>$product['pro_name'],
                    'qty'=>$qty,
                    'price'=>$product['pro_price'],
                    'image'=>$product['image'],
                ]
            ];
            session()->put('cart',$cart);
        }
        if($cart && !isset($cart[$id])){
            $cart[$id]=[
                'name'=>$product['pro_name'],
                'qty'=>$qty,
                'price'=>$product['pro_price'],
                'image'=>$product['image'],
            ];
            session()->put('cart',$cart);
        }

        return $cart;
    }

    public function removeCart($id)
    {
        if($id) {

            $cart = session()->get('cart');

            if(isset($cart[$id])) {

                unset($cart[$id]);

                session()->put('cart', $cart);
            }

            session()->flash('msg', 'Product removed from successfully');
        }
        return back();
    }
}
