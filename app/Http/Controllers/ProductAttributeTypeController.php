<?php

namespace App\Http\Controllers;

use App\ProductAttributeType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
            'pat_name' => 'required',
            'pat_label' => 'required',
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
    public function edit(ProductAttributeType $pat)
    {
        return view('admin.productAttributeType.edit',compact('pat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAttributeType  $productAttributeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttributeType $pat)
    {
        $pat->update($request->all());
        return back()->with('msg','Product Attribute Type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAttributeType  $productAttributeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttributeType $pat)
    {
        $pat->delete();
        return back()->with('msg','Product Attribute Type Deleted');
    }

    public function getPATDT()
    {
        return DataTables::of(ProductAttributeType::query())
            ->addColumn('action', function ($pat) {
                return '<form method="post" action="'.route('pat.destroy',$pat->id).'">
                '.csrf_field().'
                <input type="hidden" name="_method" value="DELETE"> 
                <a href="'.url('/').'/admin/pat/'.$pat->id.'/edit " class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                </form>';
            })
            ->make(true);
    }
}
