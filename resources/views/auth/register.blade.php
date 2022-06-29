@extends('layouts.appauth')

@section('content')
@if( !empty(Session::get('nama')))
        <div class="content-auth col-md-10">
            <div class="card-auth" style="width: 600px">
                <div id="main" class="main col-lg-12 text-md-center">
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
                    Silakan buat akun SIWI Anda
                </div>
                <form method="POST" class="form-auth col-md-8" action="{{ route('register') }}">
                    @csrf
                    <div class="card-auth-subtitle">
                        <label class="text-md-center">{{ __('NPM') }}<label>
                    </div>
                    <div class="form-group row">
                                <input id="npm" type="text" class="form-control col-md-12 auth-input-locked @error('npm') is-invalid @enderror" name="npm" value="{{ Session::get('npm') }}" required autocomplete="npm" readonly >

                                @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">{{ __('Alamat Surel') }} <i>(e-mail)</i><label>
                    </div>
                    <div class="form-group row">
                                <input id="email" type="email" class="form-control col-md-12 auth-input-locked @error('email') is-invalid @enderror" name="email" value="{{ Session::get('email') }}" required autocomplete="email" readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message ?? '' }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center"><i>{{ __('Password (Minimal 8 Karakter)') }}</i><label>
                    </div>
                    <div class="form-group row">
                                <input id="password" type="password" data-toggle="password" class="form-control col-md-12 auth-input-pass @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Ulangi <i>{{ __('Password') }}</i><label>
                    </div>
                    <div class="form-group row">
                                <input id="password-confirm" type="password" data-toggle="password" class="form-control col-md-12 auth-input-pass" name="password_confirmation" required autocomplete="new-password">
                    </div>

                        <div class="form-group row" style="margin: 30px 0 18px 0">
                            <div class="col-md-12 text-md-center">
                                <button type="submit" class="btn-auth btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
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
