@extends('admin.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 mt-4">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('product.update',$product->id)}}" role="form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(Session::has('msg'))
                                <div class="alert alert-info">{{Session::get('msg')}}</div>
                            @endif
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" name="pro_name" id="pro_name" placeholder="Enter Name" value="{{$product->pro_name}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Product Slug</label>
                                <input type="text" class="form-control" name="pro_slug" id="pro_slug" placeholder="Enter Slug" value="{{$product->pro_slug}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Product Code</label>
                                <input type="text" class="form-control" name="pro_code" id="pro_code" placeholder="Enter Product Code" value="{{$product->pro_code}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Product Price</label>
                                <input type="text" class="form-control" name="pro_price" id="pro_price" placeholder="Enter Product Price" value="{{$product->pro_price}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Product Info</label>
                                <textarea class="form-control" name="pro_info" id="pro_info" placeholder="Enter Product Info">{{$product->pro_info}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Stock</label>
                                <input type="number" class="form-control" name="stock" id="stock" placeholder="Enter Product stock" value="{{$product->stock}}">
                            </div>
                            <div class="form-group">
                                <label for="parent">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $c)
                                        @if($product->category_id==$c->id)
                                            <option value="{{$c->id}}" selected>{{$c->cat_name}}</option>
                                        @else
                                            <option value="{{$c->id}}">{{$c->cat_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" class="form-control-file" name="image" id="image" >
                            </div>
                            <div class="form-group">
                                <label for="name">SPL Price</label>
                                <input type="text" class="form-control" name="spl_price" id="spl_price" placeholder="Enter SPL Price" value="{{$product->spl_price}}">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->





            </div>

        </div>
        <!-- /.row -->
    </div>
    </div>
@endsection