<?php

namespace App\Http\Controllers\front;

use App\Product;
use App\ProductAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $products=Product::orderBy('created_at','desc')->paginate(9);
        return view('front.index',compact('products'));
    }

    public function productDetails($slug)
    {
        $product=Product::where('pro_slug',$slug)->first();
        $pa_colors=ProductAttribute::where('pro_id',$product->id)->where('pat_id',1)->get();
        return view('front.productDetails',compact('product','pa_colors'));
    }
}
