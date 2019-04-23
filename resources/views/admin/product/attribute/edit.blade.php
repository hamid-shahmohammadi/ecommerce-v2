@extends('admin.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$product->pro_name}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('pa.index',$product->id)}}">Product Attribute</a></li>
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
                        <h3 class="card-title">Edit Product Attribute</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('pa.update',$pa->id)}}" role="form" method="POST">
                        <input type="hidden" name="pro_id" value="{{$pa->pro_id}}">
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
                                <label for="parent">Product Attribute Type</label>
                                <select class="form-control" name="pat_id">
                                    @foreach($pats as $p)
                                        @if($pa->pat_id==$p->id)
                                            <option value="{{$p->id}}" selected>{{$p->name}}</option>
                                        @else
                                            <option value="{{$p->id}}">{{$p->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Price</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price" value="{{$pa->price}}">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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