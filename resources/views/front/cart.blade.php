@extends('front.master')

@section('content')
    <div id="app" class="container mt-5">
    <h2>Cart</h2>

    <table class="table cart" v-if="carts" >
        <tr>
            <th>Image</th>
            <th>name</th>
            <th>price</th>
            <th>qty</th>
            <th>total</th>
            <th>remove</th>
        </tr>

            <tr v-for="(cart,id) in carts">
                <td><img width="100" height="100" class="img-thumbnail" :src="showImage(cart.image)" /></td>
                <td>@{{ cart.name }}</td>
                <td>@{{ cart.price }}</td>
                <td><input v-model="cart.qty" min="1" style="width: 40px;" type="number" ></td>
                <td>
                    <div>@{{ cart.price * cart.qty }}</div>

                </td>
                <td>
                    <button @click="updateCart(id,cart.qty)" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></button>
                    <a href="" class="btn btn-danger btn-sm">X</a>
                </td>
            </tr>

    </table>
    <hr/>
    <form action="{{route('checkout.store')}}" method="post">
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        @csrf
        <div>
            {{--<input type="checkbox" name="exist" value="exist">exist--}}
            <div v-show="!showAddress">
            @if($addresses)
                @foreach($addresses as $address)
                    <input type="radio" name="address_id" value="{{$address->id}}">{{$address->address}}<br/>
                @endforeach
            @endif
            </div>
        </div>
        <hr/>
        <input v-model="newAddress" type="checkbox" name="new" value="new" @change="showNewAddress">New Address
        <div v-show="showAddress">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">State:</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="Enter state">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">City:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Country:</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Company:</label>
                <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <textarea class="form-control" id="address" name="address"></textarea>
        </div>

        </div>
        <div>
            <hr/>
        <button type="submit" class="btn btn-primary">Checkout</button>
        </div>
    </form>


    </div>
@endsection
@section('js')
    <script>
        const base_url='{{url('/')}}';
    </script>
    <script src="{{asset('/assets/js/axios.min.js')}}"></script>
    <script src="{{asset('/assets/js/vue.min.js')}}"></script>
    <!-- development version, includes helpful console warnings -->
    {{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}
    <!-- production version, optimized for size and speed -->
    {{--<script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
    <script src="{{asset('assets/front/js/app/cart.js')}}"></script>
@endsection