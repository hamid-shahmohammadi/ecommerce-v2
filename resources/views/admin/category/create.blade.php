@extends('admin.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
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
                        <h3 class="card-title">Create Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('category.store')}}" role="form" method="POST">
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
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="cat_slug">Slug</label>
                                <input type="text" class="form-control" name="cat_slug" id="cat_slug" placeholder="Enter Slug">
                            </div>
                            <div class="form-group">
                                <label for="parent">Parent</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Select Category</option>
                                    @foreach($categories as $c)
                                       <option value="{{$c->id}}">{{$c->cat_name}}</option>
                                    @endforeach
                                </select>
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