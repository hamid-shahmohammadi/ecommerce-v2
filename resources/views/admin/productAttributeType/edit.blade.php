@extends('admin.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product Attribute Type</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('pat.index')}}">Product Attribute Type</a></li>
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
                        <h3 class="card-title">Edit Product Attribute Type</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('pat.update',$pat->id)}}" role="form" method="POST">
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
                                <label for="pat_name">Name</label>
                                <input type="text" class="form-control" name="pat_name" id="pat_name" placeholder="Enter Name" value="{{$pat->pat_name}}">
                            </div>
                            <div class="form-group">
                                <label for="pat_label">Label</label>
                                <input type="text" class="form-control" name="pat_label" id="pat_label" placeholder="Enter Label" value="{{$pat->pat_label}}">
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