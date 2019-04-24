@extends('front.master')

@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($products as $p)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="img-thumbnail" src="{{url('assets/img/product/small/'.$p->image)}}" />
                        <div class="card-header">
                            <h6>{{$p->pro_name}}</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$p->pro_info}}</p>
                            <p class="card-text">{{$p->pro_price}} $</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('product.details',$p->pro_slug)}}" ><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">{{ $p->diffTime() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

</main>

@endsection

