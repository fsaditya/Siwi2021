<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | Sistem Informasi Wisudawan</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/preload.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- icon --}}
    <link rel = "icon" href = "{{asset('img/logo_siwi.png')}}"  type = "image/x-icon">

    <!-- Styles -->
    <link href="toastr.css" rel="stylesheet"/>
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/preload.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body style="overflow: hidden">
    <div id="main" class="main" style="width: 100%;height:100vh;position: absolute;top:0">
        <div class="preloader" id="preloader">
            <div class="preloader__square" id="preloader__square"></div>
            <div class="preloader__square" id="preloader__square"></div>
            <div class="preloader__square" id="preloader__square"></div>
            <div class="preloader__square" id="preloader__square"></div>
        </div>
    </div>
    <div id="app">
            {{-- <div class="status">Loading<span class="status__dot">.</span><span class="status__dot">.</span><span class="status__dot">.</span></div> --}}


        {{-- @include('guest.nav') --}}

        <main class="py-0">
            @yield('content')
        </main>
    </div>

    {{-- <script>
        $(window).ready(function()
        {
            $("#main").fadeOut(2000);
            $("#preloader").fadeOut(2000);
            $("#preloader_square").fadeOut(2000);
        });
    </script> --}}
    <script src="{{ asset('js/iziToast.js') }}"></script>
    <script src="jquery.min.js"></script>
    <script src="toastr.js"></script>
</body>
</html>
