<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ecom</title>
    <link rel="stylesheet" href="{{asset('/assets/front/css/album.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/front/css/bootstrap.min.css')}}">
    @yield('css')

</head>
<body>
<header>
    @include('front.inc.nav')
</header>
@if(session('msg'))
    <div class="alert alert-info">{{session('msg')}}</div>
@endif
@yield('content')

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.3/getting-started/introduction/">getting started guide</a>.</p>
    </div>
</footer>
<script src="{{asset('/assets/front/js/jquery.js')}}"></script>
<script src="{{asset('/assets/front/js/bootstrap.bundle.min.js')}}"></script>
@yield('js')
</body>
</html>