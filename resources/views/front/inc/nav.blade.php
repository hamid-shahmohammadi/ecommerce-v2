<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Ecom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto">
            @if(Auth::check())
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Order</a>
                    <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
            @endif
            @if(session('cart'))
                    <li class="nav-item dropdown" >

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> {{count(session('cart'))}}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 20rem;">
                            <table class="cart" style="font-size: 12px;" >
                                <tr>
                                    <th>Image</th>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>qty</th>
                                    <th>total</th>
                                    <th>remove</th>
                                </tr>
                            @foreach(session('cart') as $id=>$details)
                                <tr>
                                    <td><img width="40" height="40" class="img-thumbnail" src="{{url('/assets/img/product/small/'.$details['image'])}}" /></td>
                                    <td>{{$details['name']}}</td>
                                    <td>{{$details['price']}}</td>
                                    <td>{{$details['qty']}}</td>
                                    <td>{{$details['qty']*$details['price']}}</td>
                                    <td><a href="{{route('front.removecart',$id)}}" class="btn btn-danger btn-sm">X</a> </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2"><a href="{{route('front.cart')}}" ><button class="btn btn-secondary btn-sm">View Cart</button></a></td>
                                </tr>
                            </table>
                        </div>
                    </li>

            @endif



        </ul>
        {{--<form class="form-inline my-2 my-lg-0">--}}
        {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
        {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
        {{--</form>--}}
    </div>
</nav>
<style>
    table.cart td,th{
        padding: 5px;
    }
</style>