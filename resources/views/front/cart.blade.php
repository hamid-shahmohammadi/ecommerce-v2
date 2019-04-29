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

    <a class="btn btn-primary" href="{{route('checkout')}}">Checkout</a>

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