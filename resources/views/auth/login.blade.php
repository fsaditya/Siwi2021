@extends('layouts.appauth')

@section('content')
@include('part.notification')

@if( !empty(Session::get('nama')))
        <div class="content-auth col-md-10">
            <div class="card-auth" style="width: 600px">
                {{-- @include('part.notification') --}}
                <div id="main" class="main col-md-12 text-md-center">
                    <div class="preloader" id="preloader">
                        <div class="preloader__square" id="preloader__square"></div>
                        <div class="preloader__square" id="preloader__square"></div>
                        <div class="preloader__square" id="preloader__square"></div>
                        <div class="preloader__square" id="preloader__square"></div>
                    </div>
                    {{-- <div class="status">Loading<span class="status__dot">.</span><span class="status__dot">.</span><span class="status__dot">.</span></div> --}}
                </div>

                <div class="auth-header">
                    <b>Selamat Datang, {{ Session::get('nama') }}</b>
                </div>
                <div class="p">
                    Silakan &nbsp;<i>login</i>&nbsp; ke akun SIWI Anda
                </div>
                    <form method="POST" class="form-auth col-md-8" style="padding-top: 40px" action="{{ route('login') }}">
                        @csrf
                            {{-- <div class="card-auth-title">
                            <label for="email" class="text-md-right">{{ __('Alamat Surel ') }} (<i>e-mail</i>)</label>
                            </div> --}}
                        <div class="form-group row">
                                <input id="email" type="hidden" class="form-control auth-input @error('email') is-invalid @enderror" name="email" value="{{ Session::get('email') }}" required autocomplete="email" autofocus readonly>

                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}

                        </div>

                        <div class="card-auth-title">
                            <label class="text-md-right"><i>{{ __('Password') }}</i><label>
                        </div>
                        <div class="form-group row">
                                <input id="password" type="password" data-toggle="password" class="auth-input-pass form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row col-md-12 form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingat Saya') }}
                                    </label>
                                    <label class="form-forget" for="remember">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link link-forget" href="{{ route('password.request') }}">
                                                Lupa <i>Password </i>?
                                            </a>
                                        @endif
                                    </label>
                        </div>

                        <div class="ow mb-0 form-footer text-md-center">
                                <button type="submit" class="btn-auth btn-primary">
                                    {{ __('Login') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="image-rotate">
                <img src="{{asset('img/logo_angkatan.png')}}" class="logo-rotating" alt="">
            </div>

            <div class="image-rotate-2">
                <img src="{{asset('img/logo_angkatan.png')}}" class="logo-rotating" alt="">
            </div>
@else
    @include('welcome');
@endif
@endsection
