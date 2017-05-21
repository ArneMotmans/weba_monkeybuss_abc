<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
    <link href="{{ asset('css/datatable.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsiveDatatable.css') }}" rel="stylesheet" type="text/css">
    <title>Laravel</title>
    <title>Monkey Business</title>
</head>
<body>
<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-text navbar-left">@include('partials.navigationKlanten')</div>
        <div class="navbar-text navbar-right">@include('partials.navigationKlantenAdd')</div>
    </div>
</nav>
@yield('content')

</body>
</html>
