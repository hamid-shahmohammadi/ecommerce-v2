<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }
    public function create(){
        $categories=Category::where('parent_id',0)->get();
        return view('admin.category.create',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'cat_name' => 'required',
            'cat_slug' => 'required|unique:categories',
        ]);
        Category::create($request->all());
        return back()->with('msg','Create Category Success');
    }

    public function getCategoryDT()
    {
        return DataTables::of(Category::query())
            ->addColumn('action', function ($category) {
                return '<form method="post" action="'.route('category.destroy',$category->id).'">
                '.csrf_field().'
                <input type="hidden" name="_method" value="DELETE"> 
                <a href="'.url('/').'/admin/category/'.$category->id.'/edit " class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                </form>';
            })
            ->make(true);
    }

    public function edit(Category $category)
    {
        $categories=Category::where('parent_id',0)->get();
        return view('admin.category.edit',compact('category','categories'));
    }

    public function update(Category $category,Request $request)
    {
        $request->validate([
            'cat_name' => 'required',
            'cat_slug' => 'required|unique:categories,cat_slug,'.$category->id
        ]);
        $category->update($request->all());
        return back()->with('msg','update category success!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('msg','delete category success!');
    }


}
