<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div id="app">
        <nav class="navbar is-transparent">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                <img src="{{ asset('assets/logo/review-kurir-logo.png') }}">
            </a>
            <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
            </div>
        </div>

        <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start">
            <a class="navbar-item" href="{{ url('/') }}#home">
                Home
            </a>
            <a class="navbar-item" href="{{ url('/') }}#about">
                About
            </a>
            <a class="navbar-item" href="{{ url('/') }}#founder">
                Founder
            </a>
            <a class="navbar-item" href="{{ url('/') }}#contact">
                Contact
            </a>
            <a class="navbar-item" href="{{ route('ongkir.create') }}">
                Hitung Ongkir
            </a>
            <a class="navbar-item" href="{{ route('reviews') }}">
                Reviews
            </a> 
            </div>

            <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                @auth
                <p class="control">
                    <a class="button is-primary" href="{{ route('home') }}">
                    <span class="icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span>Home</span>
                    </a>
                </p> 
                <p class="control">
                    {!! Form::open(['route' => 'logout', 'method'=>'post']) !!}
                    <button class="button is-danger">
                    <span class="icon">
                        <i class="fas fa-key"></i>
                    </span>
                    <span>Logout</span>
                    </button>
                    {!! Form::close() !!}
                </p>
                @else
                <p class="control">
                    <a class="button is-primary" href="{{ route('login') }}">
                        Login
                    </a>
                </p>   
                <p>
                    <a class="button is-primary" href="{{ route('register') }}">
                        Register
                    </a>
                </p> 
                @endif
                </div>
            </div>
            </div>
        </div>
        </nav>
        <div class="section">
            <div class="container is-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    @yield('js')
    
</body>
</html>
