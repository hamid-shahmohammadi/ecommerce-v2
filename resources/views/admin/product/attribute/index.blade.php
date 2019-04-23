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
                        <li class="breadcrumb-item"><a href="#">Product Attribute</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <a href="{{route('pa.create',$product->id)}}" ><button class="btn btn-primary m-3"><i class="fa fa-plus"></i> </button></a>
        @if(Session::has('msg'))
            <div class="alert alert-info">{{Session::get('msg')}}</div>
        @endif
        <table class="table table-bordered table-hover dataTable" id="users-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Product Attribute Type</th>
                <th>price</th>
                <th><i class="fa fa-cog"></i> </th>
            </tr>
            </thead>
        </table>
    </div>

@endsection
@section('javascript')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('getPADT',$product->id) !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection