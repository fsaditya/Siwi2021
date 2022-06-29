@extends('layouts.app')

@section('content')
@include('part.notification')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        {{-- <a href="{{ url('/home') }}">Home</a> --}}
                    {{-- @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif
                <div class="content-auth col-md-8 center">
                        {{-- <div class="image-auth col-md-4">
                            <img src="{{asset('img/logo_siwi.png')}}" alt="">
                        </div>
                        <div class="col-md-1"></div> --}}
                    <div class="card-auth">
                        <div class="auth-header">
                            <img src="{{asset('img/logo-gold.png')}}" style="width:auto;height:80px" alt=""><br>
                            <b></b>
                        </div>
                        <form method="POST" action="/authentication" class="form-auth col-md-8">
                            @csrf
                            <div class="card-auth-title" style="margin-top: 30px">
                                <label class="text-md-center">Masukkan NPM Anda<label>
                            </div>
                            <div class="form-group row">
                                    <input id="npm" type="text" class="form-control col-md-12 auth-input @error('npm') is-invalid @enderror" name="npm" value="{{ old('npm') }}" required autocomplete="npm" autofocus>

                                    @error('npm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group row mb-0 form-footer text-md-center">
                                <div class="text-md-center">
                                    <button type="submit" class="btn-auth btn-primary">
                                        {{ __('Selanjutnya') }}
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
        </div>

@endsection
