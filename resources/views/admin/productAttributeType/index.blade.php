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
                        <li class="breadcrumb-item"><a href="#">Product Attribute Type</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        @if(Session::has('msg'))
            <div class="alert alert-info">{{Session::get('msg')}}</div>
        @endif
        <table class="table table-bordered table-hover dataTable" id="users-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>label</th>
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
                ajax: '{!! route('getPATDT') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'pat_name', name: 'pat_name' },
                    { data: 'pat_label', name: 'pat_label' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection