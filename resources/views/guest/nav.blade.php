<nav class="navbar navbar-expand-md">
    <div class="container">
        <img src="{{asset('img/logo_siwi.png')}}" class="nav-logo">
        @if (Route::has('login'))
            <a class="navbar-brand" href="{{ url('/home') }}">
                Sistem Informasi<br>
                Wisudawan
                {{-- {{ config('app.name', 'Laravel') }} --}}
            </a>
        @else
            <a class="navbar-brand" href="{{ url('/') }}">
                Sistem Informasi<br>
                Wisudawan
                {{-- {{ config('app.name', 'Laravel') }} --}}
            </a>
        @endif

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            {{-- <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registrasi') }}">{{ __('Registrasi') }}</a>
                </li>
            </ul> --}}

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                            <a class="btn-link-out " style="font-size: 26px" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{-- {{ __('Keluar') }} --}}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
