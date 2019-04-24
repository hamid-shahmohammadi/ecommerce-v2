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
                        <li class="breadcrumb-item active">Create</li>
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
                        <h3 class="card-title">Create Product Attribute</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('pa.store')}}" role="form" method="POST">
                        <input type="hidden" name="pro_id" value="{{$product->id}}">
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
                                <label for="pa_name">Name</label>
                                <input type="text" class="form-control" name="pa_name" id="pa_name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="parent">Product Attribute Type</label>
                                <select class="form-control" name="pat_id">
                                    @foreach($pats as $p)
                                        <option value="{{$p->id}}">{{$p->pat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Price</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
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