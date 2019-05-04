@extends('front.master')

@section('content')
<div class="container mt-5">
    <h2>Payment</h2>
    <div>
        <table class="table cart" v-if="carts" >
            <tr>
                <th>Image</th>
                <th>name</th>
                <th>price</th>
                <th>qty</th>
                <th>total</th>
            </tr>
            <?php $total=0; ?>
            @foreach(session('cart') as $cart)
            <tr>
                <td><img width="100" height="100" class="img-thumbnail" src="{{url('assets/img/product/small/'.$cart['image'])}}" /></td>
                <td>{{ $cart['name'] }}</td>
                <td>{{ $cart['price'] }}</td>
                <td>{{ $cart['qty'] }}</td>
                <td>
                    <div>{{ $cart['price'] * $cart['qty'] }}</div>
                </td>

            </tr>
            <?php $total+=$cart['price'] * $cart['qty']; ?>
            @endforeach

        </table>
        <h2>Address</h2>
        <p>
            {{$address->address}}
        </p>
        <form method="post" action="{{route('payment.send')}}">
            @csrf
            <input type="hidden" name="amount" value="{{$total}}">
            <input type="hidden" name="order_id" value="{{$order_id}}">
            <div class="m-3">{{$total}}</div>
            <button type="submit" class="btn btn-primary">Payment</button>
        </form>
    </div>
</div>

@endsection