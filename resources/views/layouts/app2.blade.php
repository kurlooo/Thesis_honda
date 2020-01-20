<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Favicon -->
    <link href="{{asset('/img/honda-logo1.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <!-- Icons -->
    <link href="{{ asset('/argon/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link href="{{ asset('/argon/css/argon.css')}}" rel="stylesheet">


    <style>
        button::-moz-focus-inner {
            border: 0;
        }

        a:focus {
            outline: none;
        }
    </style>
</head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

{{--        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>--}}
{{--        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>--}}

        @stack('js')

        <!-- Argon JS -->
    </body>
</html>
