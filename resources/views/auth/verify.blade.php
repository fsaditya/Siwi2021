@extends('layouts.appauth')

@section('content')

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
                <div class="auth-header" style="margin: 40px 0 20px 0">
                    <b>Verifikasi e-mail Anda</b>
                </div>
                <div class="form-auth">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan verifikasi baru telah terkirim') }}
                        </div>
                    @endif
                    <div class="col-md-12">
                    <div class="card-auth-title">
                    {{ __('Kami telah mengirimkan link verifikasi ke e-mail Anda, mohon klik link tersebut untuk memverifikasi e-mail Anda.') }}<br><br>

                    Jika Anda belum menerima e-mail link verifikasi, Anda bisa melakukan :
                    <ol>
                        <li> Cek pada bagian spam, promosi, atau bagian sosial pada e-mail Anda</li>
                        <li> Mengirim ulang e-mail link verifikasi dengan
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link-verif p-0 m-0 align-baseline">{{ __(' klik di sini') }}</button>.
                            </form>
                        </li>
                    </ol>
                    </div>
                    </div>
                    <br><br>
                    <div class="col-md-12 text-md-right">
                        <button type="submit" class="btn-auth btn-primary">
                        <a class="btn-link-out " href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                {{ __('Keluar') }}
                        </a>
                    </button>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="image-rotate">
            <img src="{{asset('img/logo_angkatan.png')}}" class="logo-rotating" alt="">
        </div>

        <div class="image-rotate-2">
            <img src="{{asset('img/logo_angkatan.png')}}" class="logo-rotating" alt="">
        </div> --}}
@endsection
