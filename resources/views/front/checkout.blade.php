@extends('front.master')

@section('content')
<div class="container mt-5">
    <h2>Check out</h2>
    <div>
        <form action="{{route('checkout.store')}}" method="post">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">State:</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="Enter state">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">City:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Country:</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Company:</label>
                <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection