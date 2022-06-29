@extends('layouts.appdash')

@section('content')


<div id="main" class="main" style="width: 100%">
    <div class="preloader" id="preloader">
        <div class="preloader__square" id="preloader__square"></div>
        <div class="preloader__square" id="preloader__square"></div>
        <div class="preloader__square" id="preloader__square"></div>
        <div class="preloader__square" id="preloader__square"></div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="home-title">Selamat {{$salam ??''}}, {{ $mahasiswas->nama ??'' }}</div>

            @include("home.slide")

            <div class="home-card">
                <div class="home-card-body col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="status col-md-6">
                        <p>Status Registrasi Wisuda</p>
                    </div>
                    <div class="status col-md-6 text-md-right">
                        @if ( $mahasiswas->status_registrasi  == 1)
                            <button class="btn btn-warning">Belum Dikunci</button>
                        @elseif ($mahasiswas->status_registrasi  == 2)
                            <button class="btn btn-success">Berhasil <i class="fas fa-check-circle"></i></button>
                        @else
                            <button class="btn btn-danger">Kosong</button>
                        @endif
                    </div>
                    <div class="status col-md-6">
                        <p>Status Pembayaran Toga</p>
                    </div>
                    <div class="status col-md-6 text-md-right">
                        @if ($getInvoices['status'] == "EXPIRED" ?? $mahasiswas->status_ambil_toga  == 1)
                            <button class="btn btn-warning">Belum Dibayar</button>
                        @elseif ( $mahasiswas->status_ambil_toga  == 2)
                        <button class="btn btn-warning">Belum Dibayar</button>
                        @elseif ($getInvoices['status'] == "PAID" ?? $mahasiswas->status_ambil_toga == 3)
                            <button class="btn btn-success">Berhasil <i class="fas fa-check-circle"></i></button>
                        @elseif ($getInvoices['status'] == "SETTLED" ?? $mahasiswas->status_ambil_toga == 3)
                            <button class="btn btn-success">Berhasil <i class="fas fa-check-circle"></i></button>
                        @else
                            <button class="btn btn-danger">Kosong</button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="menus col-md-12">
                <a class="menus-link" href="{{ route('registrasi') }}">
                    <div class="col-md-6">
                    <div class="menus-button">
                        <div class="menus-icon">
                            <img src="{{ asset('img/regist.png')}}">
                        </div>
                        <div class="menus-caption">
                            {{ __('Pendaftaran Wisuda') }}
                        </div>
                    </div>
                    </div>
                </a>
                <a class="menus-link" @if($status_toga->status == 1)@else href="{{ route('toga') }}" @endif >
                    <div class="col-md-6">
                    <div @if($status_toga->status == 1) class="menus-button-nonactive" @else class="menus-button" @endif>
                        <div class="menus-icon">
                            <img src="{{ asset('img/toga.png')}}">
                        </div>
                        <div class="menus-caption">
                            {{ __('Pembayaran Toga') }}
                        </div>
                    </div>
                    </div>
                </a>
                @if($status_persembahan->status > 0)
                    <a class="menus-link" href="{{ route('persembahan') }}">
                        <div class="col-md-6">
                        <div class="menus-button ">
                            <div class="menus-icon">
                                <img src="{{ asset('img/persembahan.png')}}">
                            </div>
                            <div class="menus-caption">
                                {{ __('Persembahan Wisuda') }}
                            </div>
                        </div>
                        </div>
                    </a>
                @endif
                @if($status_keringanan->status > 0)
                    <a class="menus-link" href="{{ route('keringanan') }}">
                        <div class="col-md-6">
                        <div class="menus-button ">
                            <div class="menus-icon">
                                <img src="{{ asset('img/keringanan.png')}}">
                            </div>
                            <div class="menus-caption">
                                {{ __('Pengajuan Keringanan') }}
                            </div>
                        </div>
                        </div>
                    </a>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
