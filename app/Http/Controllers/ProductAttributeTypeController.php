<?php

namespace App\Http\Controllers;

use App\ProductAttributeType;
use Illuminate\Http\Request;

class ProductAttributeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.productAttributeType.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productAttributeType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'label' => 'required',
        ]);
        ProductAttributeType::create($request->all());
        return back()->with('msg','Create Product Attribute Type Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductAttributeType  $productAttributeType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttributeType $productAttributeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductAttributeType  $productAttributeType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttributeType $productAttributeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAttributeType  $productAttributeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttributeType $productAttributeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAttributeType  $productAttributeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttributeType $productAttributeType)
    {
        //
    }
}
