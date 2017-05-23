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
    <title>Monkey Business</title>
</head>
<body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/klanten') }}">
            {{ config('app.name', 'Monkey Business') }}
        </a>
        <div class="navbar-text navbar-left">@include('partials.navigationKlantenAdd')</div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield('content')


</body>
</html>
