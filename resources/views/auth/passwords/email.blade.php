@extends('layouts.appauth')

@section('content')
@include('part.notification')
<div class="content-auth col-md-10">
    <div class="card-auth" style="width: 600px">
                <div id="main" class="main col-md-12 text-md-center">
                    <div class="preloader" id="preloader">
                        <div class="preloader__square" id="preloader__square"></div>
                        <div class="preloader__square" id="preloader__square"></div>
                        <div class="preloader__square" id="preloader__square"></div>
                        <div class="preloader__square" id="preloader__square"></div>
                    </div>
                    {{-- <div class="status">Loading<span class="status__dot">.</span><span class="status__dot">.</span><span class="status__dot">.</span></div> --}}
                </div>

                    <div class="auth-header" style="margin-bottom: 50px;margin-top:40px">
                        <b>Reset <i>Password</i></b>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="form-auth col-md-8">
                        @csrf

                        <div class="card-auth-title">
                            <label class="text-md-right">E-mail Address</i><label>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                                <input id="email" type="email" class="auth-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-0 form-footer text-md-center">
                            <button type="submit" class="btn-auth btn-primary" style="width: auto">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
