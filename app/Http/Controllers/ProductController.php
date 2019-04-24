<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Yajra\DataTables\DataTables;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_input=$request->except('image');
        $request->validate([
            'pro_name' => 'required',
            'pro_slug' => 'required|unique:products',
            'pro_code' => 'required',
            'pro_price' => 'required',
            'pro_info' => 'required',
            'stock' => 'required',
        ]);
        if($request->has('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $image_name=time().'_'.uniqid().'.'.$ext;
            Image::make($file)->save(public_path('assets/img/product/orginal/').$image_name);
            $image = Image::make($file)->resize(300, 200);
            $image->save(public_path('assets/img/product/small/').$image_name);
            $form_input['image']=$image_name;
        }
        Product::create($form_input);
        return back()->with('msg','product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('admin.product.edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product,Request $request)
    {
        $form_input=$request->except('image','_method','_token');
        $request->validate([
            'pro_name' => 'required',
            'pro_slug' => 'required|unique:products,pro_slug,'.$product->id,
            'pro_code' => 'required',
            'pro_price' => 'required',
            'pro_info' => 'required',
            'stock' => 'required',
        ]);
        $currentImage=$product->image;
        if($request->has('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $image_name=time().'_'.uniqid().'.'.$ext;
            Image::make($file)->save(public_path('assets/img/product/orginal/').$image_name);
            $image = Image::make($file)->resize(300, 200);
            $image->save(public_path('assets/img/product/small/').$image_name);
            $form_input['image']=$image_name;
            $orginal_path=public_path('assets/img/product/orginal/').$currentImage;
            if (file_exists($orginal_path)){
                @unlink($orginal_path);
            }
            $small_path=public_path('assets/img/product/small/').$currentImage;
            if (file_exists($small_path)){
                @unlink($small_path);
            }
        }
        $product->update($form_input);
        return back()->with('msg','product created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('msg','delete product success!');
    }

    public function getProductDT()
    {
        return DataTables::of(Product::query())
            ->addColumn('action', function ($product) {
                return '<form method="post" action="'.route('product.destroy',$product->id).'">
                '.csrf_field().'
                <input type="hidden" name="_method" value="DELETE"> 
                <a href="'.route('pa.index',$product->id).'" class="btn btn-xs btn-secondary"><i class="fa fa-tag"></i></a>
                <a href="'.url('/').'/admin/product/'.$product->id.'/edit " class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                </form>';
            })
            ->make(true);
    }
}
