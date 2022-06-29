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
    @include('part.notification')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="home-card" style="margin-bottom:80px ">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                @if($status_toga->status == 1)

                <div class="locked col-md-12 text-md-right">
                    <div class="alert alert-light alert-block animate alert-dismissible fade show shadow text-md-center"  role="alert" aria-live="polite" aria-atomic="true" data-delay="3000" data-autohide="true" data-animate="fadeInUp" role="alert">
                        <strong>SEGERA</strong>
                    </div>
                </div>

                @elseif($status_toga->status == 2)

                <div class="locked col-md-12 text-md-right">
                    <div class="alert alert-light alert-block animate alert-dismissible fade show shadow text-md-center"  role="alert" aria-live="polite" aria-atomic="true" data-delay="3000" data-autohide="true" data-animate="fadeInUp" role="alert">
                        <strong>Pembayaran Toga Telah Ditutup</strong>
                    </div>
                </div>

                @else
                @if ( $mahasiswas->status_ambil_toga == 0 )

                <div class="home-card-step">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-caption">Isi Data</div>
                    </div>
                    <div class="step">
                        <div class="step-number non-active-number">2</div>
                        <div class="step-caption non-active-caption">Pembayaran</div>
                    </div>
                </div>

                <form action="/createToga" class="form-auth col-md-10" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <div class="home-card-title">
                        Silakan Isi Data Berikut
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Ukuran Toga &nbsp;<i class="fas fa-info-circle" data-toggle="modal" data-target="#exampleModal"></i> <label>
                    </div>
                    <div class="form-group row">
                                {{-- <input id="size_toga" type="text" class="form-control col-md-12 auth-input @error('size_toga') is-invalid @enderror" name="size_toga" value="{{ $togas->size_toga ?? '' }}" required autocomplete="size_toga"> --}}
                                <select name="size_toga" id="size_toga" class="form-control col-md-12 auth-input @error('size_toga') is-invalid @enderror">
                                    <option value="" selected disabled ></option>
                                    <option value="XS" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XS") selected @endif @endif >XS</option>
                                    <option value="S" @if(!empty($togas->size_toga)) @if($togas->size_toga == "S") selected @endif @endif >S</option>
                                    <option value="M" @if(!empty($togas->size_toga)) @if($togas->size_toga == "M") selected @endif @endif >M</option>
                                    <option value="L" @if(!empty($togas->size_toga)) @if($togas->size_toga == "L") selected @endif @endif >L</option>
                                    <option value="XL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XL") selected @endif @endif >XL</option>
                                    <option value="XXL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XXL") selected @endif @endif >XXL</option>
                                    <option value="XXXL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XXXL") selected @endif @endif >XXXL</option>
                                </select>
                                @error('size_toga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>


                    <div class="card-auth-subtitle">
                        <label class="text-md-center">No. Whatsapp<label>
                    </div>
                    <div class="form-group row">
                                <input id="no_wa" type="text" class="form-control col-md-12 auth-input @error('no_wa') is-invalid @enderror" name="no_wa" value="{{ $togas->no_wa ?? '' }}" required autocomplete="no_wa"  >

                                @error('no_wa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Provinsi<label>
                    </div>
                    <div class="form-group row">
                                {{-- <input id="kelas" type="text" class="form-control col-md-12 auth-input @error('kelas') is-invalid @enderror" name="kelas" value="{{ $mahasiswas->kelas ?? '' }}" required autocomplete="kelas"  > --}}
                                <select name="provinsi" id="provinsi" class="form-control col-md-12 auth-input @error('provinsis') is-invalid @enderror">
                                    <option value="" disabled selected></option>
                                    @foreach ($provinces as $id => $name)
                                        <option value="{{ $id }}" @if(!empty($alamats->provinsi)) @if($alamats->provinsi == $id) selected @endif @else @endif >{{ $name }}</option>
                                    @endforeach
                                </select>

                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Kota / Kabupaten<label>
                    </div>
                    <div class="form-group row">

                                <select name="kota" id="kota" class="form-control col-md-12 auth-input @error('kota') is-invalid @enderror">
                                    @if( empty($alamats->kota))
                                        <option value="" disabled selected></option>
                                    @else
                                        <option value="{{$alamats->kota}}"selected>{{$kotas->name}}</option>
                                    @endif
                                </select>

                                @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Kecamatan<label>
                    </div>
                    <div class="form-group row">

                        <select name="kecamatan" id="kecamatan" class="form-control col-md-12 auth-input @error('kecamatan') is-invalid @enderror">
                            @if( empty($alamats->kecamatan))
                                <option value="" disabled selected></option>
                            @else
                                <option value="{{$alamats->kecamatan}}"selected>{{$kecamatans->name}}</option>
                            @endif
                        </select>

                        @error('kecamatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Kelurahan / Desa<label>
                    </div>
                    <div class="form-group row">

                        <select name="kelurahan" id="kelurahan" class="form-control col-md-12 auth-input @error('kelurahan') is-invalid @enderror">
                            @if( empty($alamats->kelurahan))
                                <option value="" disabled selected></option>
                            @else
                                <option value="{{$alamats->kelurahan}}"selected>{{$kelurahans->name}}</option>
                            @endif
                        </select>

                        @error('kelurahan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Kode Pos<label>
                    </div>
                    <div class="form-group row">
                                <input id="kode_pos" type="text" class="form-control col-md-12 auth-input @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{ $alamats->kode_pos ?? '' }}" required autocomplete="kode_pos"  >

                                @error('kode_pos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Alamat Lengkap (Jalan, Blok, RT/RW)<label>
                    </div>
                    <div class="form-group row">
                                <textarea id="alamat"  rows="4" class="form-control col-md-12 auth-input @error('alamat') is-invalid @enderror" name="alamat" value="{{ $togas->alamat ?? '' }}" required autocomplete="alamat" >{{$alamats->alamat ?? ''}}
                                </textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                        <div class="form-group row" style="margin: 30px 0 18px 0">
                            <div class="btn-area col-md-12 text-md-center">
                                <button type="submit" class="btn-auth btn-primary">
                                    {{ __('Selanjutnya') }}
                                </button>
                            </div>
                        </div>
                </form>

                @elseif($getInvoices['status'] == "EXPIRED" ?? $mahasiswas->status_ambil_toga == 1)

                    <div class="home-card-step">
                        <div class="step">
                            <div class="step-number non-active-number">1</div>
                            <div class="step-caption non-active-caption">Isi Data</div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-caption">Pembayaran</div>
                        </div>
                    </div>

                    <form action="/lockToga" class="form-auth col-md-10" method="POST"  enctype="multipart/form-data">
                        @csrf

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Nama Penerima<label>
                        </div>
                        <div class="form-group row">
                                    <input id="nama" type="text" class="form-control col-md-12 auth-input @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswas->nama ?? '' }}" required autocomplete="nama" readonly >

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Nomor Telepon Penerima<label>
                        </div>
                        <div class="form-group row">
                                    <input id="no_wa" type="text" class="form-control col-md-12 auth-input @error('no_wa') is-invalid @enderror" name="no_wa" value="{{ $togas->no_wa ?? '' }}" required autocomplete="no_wa" readonly  >

                                    @error('no_wa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Ukuran Toga &nbsp;<i class="fas fa-info-circle" data-toggle="modal" data-target="#exampleModal"></i> <label>
                        </div>
                        <div class="form-group row">
                            <select name="size_toga" id="size_toga" class="form-control col-md-12 auth-input @error('size_toga') is-invalid @enderror">
                                <option value="XS" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XS") selected @else disabled @endif @endif >XS</option>
                                <option value="S" @if(!empty($togas->size_toga)) @if($togas->size_toga == "S") selected @else disabled @endif @endif >S</option>
                                <option value="M" @if(!empty($togas->size_toga)) @if($togas->size_toga == "M") selected @else disabled @endif @endif >M</option>
                                <option value="L" @if(!empty($togas->size_toga)) @if($togas->size_toga == "L") selected @else disabled @endif @endif >L</option>
                                <option value="XL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XL") selected @else disabled @endif @endif >XL</option>
                                <option value="XXL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XXL") selected @else disabled @endif @endif >XXL</option>
                                <option value="XXXL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XXXL") selected @else disabled @endif @endif >XXXL</option>
                            </select>
                                    {{-- <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  > --}}

                                    @error('size_toga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Alamat Penerima<label>
                        </div>
                        <div class="form-group row">
                                    <input id="provinsi" type="text" class="form-control col-md-12 auth-input @error('provinsi') is-invalid @enderror" name="provinsi" value="{{ $provinsis->name ?? '' }}" required autocomplete="provinsi" readonly style="margin-top: 8px"  >
                                    <input id="kota" type="text" class="form-control col-md-12 auth-input @error('kota') is-invalid @enderror" name="kota" value="{{ $kotas->name ?? '' }}" required autocomplete="kota" readonly style="margin-top: 8px"  >
                                    <input id="kecamatan" type="text" class="form-control col-md-12 auth-input @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{ $kecamatans->name ?? '' }}" required autocomplete="kecamatan" readonly style="margin-top: 8px"  >
                                    <input id="kelurahan" type="text" class="form-control col-md-12 auth-input @error('kelurahan') is-invalid @enderror" name="kelurahan" value="{{ $kelurahans->name ?? '' }}" required autocomplete="kelurahan" readonly style="margin-top: 8px"  >
                                    <textarea rows="4" col="200" readonly class="form-control col-md-12 auth-input @error('alamat') is-invalid @enderror" name="alamat" value="{{$alamats->alamat ?? ''}}" required autocomplete="alamat"  style="margin-top: 8px">{{$alamats->alamat ?? ''}}
                                    </textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Kodepos<label>
                        </div>
                        <div class="form-group row">
                                    <input id="kode_pos" type="text" class="form-control col-md-12 auth-input @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{ $alamats->kode_pos ?? '' }}" required autocomplete="kode_pos" readonly  >

                                    @error('kode_pos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                        <br>
                        <hr>
                        <div class="col-md-12 d-flex h5 bg-light py-4">
                            <div class="col-md-12 text-md-right">
                                <main>
                                <table style="border:2" cellspacing="0" cellpadding="0" class="table">
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Harga Toga</td>
                                        <td>Rp.8.000,-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Biaya Admin</td>
                                        <td>Rp.2.000,-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"> TOTAL PEMBAYARAN</td>
                                        <td>Rp.10.000,-</td>
                                    </tr>
                                </tfoot>
                                </table>
                                </main>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row justify-content-between" style="margin: 30px 0 18px 0">
                                <div class="btn-area col-md-6 text-md-left">
                                    <a href="{{ route('edittoga') }}" class="btn-auth-secondary btn-secondary">
                                        {{ __('Ubah Data') }} <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <div class="btn-area col-md-6 text-md-right">
                                    <button type="submit" class="btn-auth btn-primary">
                                        {{ __('Bayar Sekarang') }} &nbsp;<i class="far fa-credit-card"></i>
                                    </button>
                                </div>
                            </div>
                    </form>

                @elseif( $getInvoices['status'] == "PAID" ?? $mahasiswas->status_ambil_toga == 3 )
                    <div class="col-md-12 text-md-center fluid">
                        <div class="centang-end text-md-center"><i class="fa fa-check-circle"></i></div>
                    </div>
                    <div class="col-md-12 text-md-center fluid">
                        <div class="caption-end text-md-center">Pembayaran toga Anda berhasil ! </div>
                    </div>
                    <hr>
                    <div class="col-md-12 text-md-center fluid" style="margin-bottom: 80px">
                        <button type="submit" class="btn-auth btn-primary downloadInvoice text-md-center" id="downloadInvoice">
                            {{ __('Unduh Invoice') }} &nbsp; <i class="fa fa-download"></i>
                        </button>
                    </div>
                @elseif( $getInvoices['status'] == "SETTLED" ?? $mahasiswas->status_ambil_toga == 3 )
                    <div class="col-md-12 text-md-center fluid">
                        <div class="centang-end text-md-center"><i class="fa fa-check-circle"></i></div>
                    </div>
                    <div class="col-md-12 text-md-center fluid">
                        <div class="caption-end text-md-center">Pembayaran toga Anda berhasil ! </div>
                    </div>
                    <hr>
                    <div class="col-md-12 text-md-center fluid" style="margin-bottom: 80px">
                        <button type="submit" class="btn-auth btn-primary downloadInvoice text-md-center" id="downloadInvoice">
                            {{ __('Unduh Invoice') }} &nbsp; <i class="fa fa-download"></i>
                        </button>
                    </div>
                @else

                <div class="home-card-step">
                    <div class="step">
                        <div class="step-number non-active-number">1</div>
                        <div class="step-caption non-active-caption">Isi Data</div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-caption">Pembayaran</div>
                    </div>
                </div>

                <form class="form-auth col-md-10">
                    @csrf

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Penerima<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama" type="text" class="form-control col-md-12 auth-input @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswas->nama ?? '' }}" required autocomplete="nama" readonly >

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nomor Telepon Penerima<label>
                    </div>
                    <div class="form-group row">
                                <input id="no_wa" type="text" class="form-control col-md-12 auth-input @error('no_wa') is-invalid @enderror" name="no_wa" value="{{ $togas->no_wa ?? '' }}" required autocomplete="no_wa" readonly  >

                                @error('no_wa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Ukuran Toga &nbsp;<i class="fas fa-info-circle" data-toggle="modal" data-target="#exampleModal"></i> <label>
                    </div>
                    <div class="form-group row">
                        <select name="size_toga" id="size_toga" class="form-control col-md-12 auth-input @error('size_toga') is-invalid @enderror">
                            <option value="XS" @if($togas->size_toga == "XS") selected @else disabled @endif >XS</option>
                            <option value="S" @if($togas->size_toga == "S") selected @else disabled @endif >S</option>
                            <option value="M" @if($togas->size_toga == "M") selected @else disabled @endif >M</option>
                            <option value="L" @if($togas->size_toga == "L") selected @else disabled @endif >L</option>
                            <option value="XL" @if($togas->size_toga == "XL") selected @else disabled @endif >XL</option>
                            <option value="XXL" @if($togas->size_toga == "XXL") selected @else disabled @endif >XXL</option>
                            <option value="XXXL" @if($togas->size_toga == "XXXL") selected @else disabled @endif >XXXL</option>
                        </select>
                                {{-- <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  > --}}

                                @error('size_toga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Alamat Penerima<label>
                    </div>
                    <div class="form-group row">
                                <textarea rows="4" col="200" readonly class="form-control col-md-12 auth-input @error('alamat') is-invalid @enderror" name="alamat"  value="{{$alamats->alamat ?? ''}}" required autocomplete="alamat" >{{$alamats->alamat ?? ''}}
                                </textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Kodepos<label>
                    </div>
                    <div class="form-group row">
                                <input id="kode_pos" type="text" class="form-control col-md-12 auth-input @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{ $alamats->kode_pos ?? '' }}" required autocomplete="kode_pos" readonly  >

                                @error('kode_pos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <br>
                    <hr>
                    <div class="col-md-12 d-flex h5 bg-light py-4">
                        <div class="col-md-12 text-md-right">
                            <main>
                            <table style="border:2" cellspacing="0" cellpadding="0" class="table">
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Harga Toga</td>
                                    <td>Rp.8.000,-</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Biaya Admin</td>
                                    <td>Rp.2.000,-</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">TOTAL PEMBAYARAN</td>
                                    <td>Rp.10.000,-</td>
                                </tr>
                            </tfoot>
                            </table>
                            </main>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row justify-content-between" style="margin: 30px 0 18px 0">
                            <div class="btn-area col-md-12 text-md-right">
                                <a href="{{$pelunasan->link_xendit ?? ''}}" target="_blank" class="btn-auth-primary btn-primary">
                                    {{ __('Lanjutkan Pembayaran') }} &nbsp;<i class="far fa-credit-card"></i>
                                </a>
                            </div>
                        </div>
                </form>
                @endif
                @endif
            </div>
        </div>
    </div>

    @if($status_toga->status == 1)
    @else
        {{-- Invoice PAID --}}
        @if($getInvoices['status'] == "PAID" ?? $mahasiswas->status_ambil_toga == 3)
        <div id="invoice-ready" class="invoice d-print-none">

            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <img src="{{asset('img/logo-gold.png')}}" style="width:180px">
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    <a target="_blank" href="https://siwi.wisudapknstan.id">
                                        Sistem Informasi <br>Wisudawan
                                    </a>
                                </h2>
                                <div>Wisuda Akbar PKN STAN 2021</div>
                                <div>siwi@wisudapknstan.id</div>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <div class="text-gray-light">INVOICE TO:</div>
                                <h2 class="to">{{$mahasiswas->nama ??''}}</h2>
                                <div class="address">{{ $alamats->alamat ??''}}</div>
                                <div class="email"><a href="mailto:{{ $users->email ??''}}">{{ $users->email ??''}}</a></div>
                            </div>
                            <div class="col invoice-details">
                                <h1 class="invoice-id">INVOICE {{ $getInvoices['id'] ?? ''}}</h1>
                                <div class="date">Waktu Pembayaran: {{ substr($getInvoices['paid_at'] ?? '', 0, 10) }}</div>
                            </div>
                        </div>
                        <main>
                        <table style="border:2" cellspacing="0" cellpadding="0" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-left">DESKRIPSI</th>
                                    <th class="text-right">HARGA</th>
                                    <th class="text-right">JUMLAH</th>
                                    <th class="text-right">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="no">01</td>
                                    <td class="text-left"><h2>Toga Wisudawan ({{$togas->size_toga ?? ''}})</h2></td>
                                    <td class="unit">Rp.8.000,-</td>
                                    <td class="qty">1</td>
                                    <td class="total">Rp.8.000,-</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Harga Toga</td>
                                    <td>Rp.8.000,-</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Biaya Admin</td>
                                    <td>Rp.2.000,-</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"><span class="badge badge-success">PAID</span> &nbsp; TOTAL PEMBAYARAN</td>
                                    <td>Rp.10.000,-</td>
                                </tr>
                            </tfoot>
                        </table>
                        </main>
                        <div class="thanks">

                        </div>
                        <div class="notices">
                        </div>
                    </main>
                    <footer style="margin-top: 30px">
                        <i class="fas fa-copyright"></i> Wisuda Akbar PKN STAN 2021
                    </footer>
                </div>
                <div></div>
            </div>
        </div>
        @else
        @endif

        {{-- Invoice SETTLED --}}
        @if($getInvoices['status'] == "SETTLED" ?? $mahasiswas->status_ambil_toga == 3)
        <div id="invoice-ready" class="invoice d-print-none">

            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <img src="{{asset('img/logo-gold.png')}}" style="width:180px">
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    <a target="_blank" href="https://siwi.wisudapknstan.id">
                                        Sistem Informasi <br>Wisudawan
                                    </a>
                                </h2>
                                <div>Wisuda Akbar PKN STAN 2021</div>
                                <div>siwi@wisudapknstan.id</div>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <div class="text-gray-light">INVOICE TO:</div>
                                <h2 class="to">{{$mahasiswas->nama ??''}}</h2>
                                <div class="address">{{ $alamats->alamat ??''}}</div>
                                <div class="email"><a href="mailto:{{ $users->email ??''}}">{{ $users->email ??''}}</a></div>
                            </div>
                            <div class="col invoice-details">
                                <h1 class="invoice-id">INVOICE {{ $getInvoices['id'] ?? ''}}</h1>
                                <div class="date">Waktu Pembayaran: {{ substr($getInvoices['paid_at'] ?? '', 0, 10) }}</div>
                            </div>
                        </div>
                        <main>
                        <table style="border:2" cellspacing="0" cellpadding="0" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-left">DESKRIPSI</th>
                                    <th class="text-right">HARGA</th>
                                    <th class="text-right">JUMLAH</th>
                                    <th class="text-right">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="no">01</td>
                                    <td class="text-left"><h2>Toga Wisudawan ({{$togas->size_toga ?? ''}})</h2></td>
                                    <td class="unit">Rp.8.000,-</td>
                                    <td class="qty">1</td>
                                    <td class="total">Rp.8.000,-</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Harga Toga</td>
                                    <td>Rp.8.000,-</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Biaya Admin</td>
                                    <td>Rp.2.000,-</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"><span class="badge badge-success">PAID</span> &nbsp; TOTAL PEMBAYARAN</td>
                                    <td>Rp.10.000,-</td>
                                </tr>
                            </tfoot>
                        </table>
                        </main>
                        <div class="thanks">

                        </div>
                        <div class="notices">
                        </div>
                    </main>
                    <footer style="margin-top: 30px">
                        <i class="fas fa-copyright"></i> Wisuda Akbar PKN STAN 2021
                    </footer>
                </div>
                <div></div>
            </div>
        </div>
        @else
    @endif
    @endif

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rincian Ukuran Toga</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="{{ asset('img/size_toga.png') }}" class="col-md-12">
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>



<script>
    $(function () {

      $('#downloadInvoice').click(function () {
        var doc = new jsPDF('l', 'mm', 'a4');
        doc.addHTML($('#invoice-ready')[0], 15, 15, {
          'background': '#fff',
        },
        function() {
          doc.save('invoice-pembayaran-toga.pdf');
        });
      });
    });
</script>
<script>
 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data)
            {
                window.print();
                return true;
            }
        });
</script>
<script>
$(function () {
    $('#provinsi').on('change', function () {
        axios.post('{{ route('toga.store') }}', {id: $(this).val()})
            .then(function (response) {
                $('#kota').empty();

                $.each(response.data, function (id, name) {
                    $('#kota').append(new Option(name, id))
                })
            });
    });
    $('#kota').on('change', function () {
        axios.post('{{ route('toga.storeDistrict') }}', {id: $(this).val()})
            .then(function (response) {
                $('#kecamatan').empty();

                $.each(response.data, function (id, name) {
                    $('#kecamatan').append(new Option(name, id))
                })
            });
    });
    $('#kecamatan').on('change', function () {
        axios.post('{{ route('toga.storeVillage') }}', {id: $(this).val()})
            .then(function (response) {
                $('#kelurahan').empty();

                $.each(response.data, function (id, name) {
                    $('#kelurahan').append(new Option(name, id))
                })
            });
    });
});

</script>
@endsection
