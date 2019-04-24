<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductAttribute;
use App\ProductAttributeType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view('admin.product.attribute.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $pats=ProductAttributeType::all();
        return view('admin.product.attribute.create',compact('product','pats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductAttribute::create($request->all());
        return back()->with('msg','Product attribute created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $pa)
    {
        $pats=ProductAttributeType::all();
        $product=Product::find($pa->pro_id);
        return view('admin.product.attribute.edit',compact('product','pats','pa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttribute $pa)
    {
        $pa->update($request->all());
        return back()->with('msg','product attribute updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $pa)
    {
        $pa->delete();
        return back()->with('msg','product attribute deleted!');
    }

    public function getPADT(Product $product)
    {
        $pa=ProductAttribute::select([
            'product_attributes.id',
            'product_attributes.pa_name',
            'product_attribute_types.pat_name',
            'product_attributes.price',
        ])->leftJoin('product_attribute_types','product_attribute_types.id','=','product_attributes.pat_id')
            ->where('pro_id',$product->id);
        return DataTables::of($pa)
            ->addColumn('action', function ($pa) {
                return '<form method="post" action="'.route('pa.destroy',$pa->id).'">
                '.csrf_field().'
                
                <a href="'.url('/').'/admin/pa/'.$pa->id.'/edit " class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                </form>';
            })
            ->make(true);
    }
}
