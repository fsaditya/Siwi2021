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

                @if($status_registrasi->status == 1)

                <div class="locked col-md-12 text-md-right">
                    <div class="alert alert-light alert-block animate alert-dismissible fade show shadow text-md-center"  role="alert" aria-live="polite" aria-atomic="true" data-delay="3000" data-autohide="true" data-animate="fadeInUp" role="alert">
                        <strong>Pendaftaran Wisuda Telah Ditutup</strong>
                    </div>
                </div>
                <form action="/lockRegistrasi" class="form-auth col-md-10" style="border-top:none" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <div class="home-card-title col-md-12 justify-content-center">
                        <img src="foto/{{$prodis->nama_prodi ?? ''}}/{{$mahasiswas->foto  ?? ''}}" alt="{{$mahasiswas->nama ??''}}" class="home-img col-md-6">
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">NPM<label>
                    </div>
                    <div class="form-group row">
                                <input id="npm" type="text" class="form-control col-md-12 auth-input @error('npm') is-invalid @enderror" name="npm" value="{{ $mahasiswas->npm ?? '' }}" required autocomplete="npm" readonly >

                                @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>


                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama" type="text" class="form-control col-md-12 auth-input @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswas->nama ?? '' }}" required autocomplete="nama" readonly  >

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Kelas (Contoh : 6-02)<label>
                    </div>
                    <div class="form-group row">
                                <input id="kelas" type="text" class="form-control col-md-12 auth-input @error('kelas') is-invalid @enderror" name="kelas" value="{{ $mahasiswas->kelas ?? '' }}" required autocomplete="kelas" readonly  >

                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">No. Absen<label>
                    </div>
                    <div class="form-group row">
                                <input id="absen" type="text" class="form-control col-md-12 auth-input @error('absen') is-invalid @enderror" name="absen" value="{{ $mahasiswas->absen ?? '' }}" required autocomplete="absen" readonly  >

                                @error('absen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Program Studi<label>
                    </div>
                    <div class="form-group row">
                        <select id="prodi_id" name="prodi_id" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" readonly>
                            <option value="11" @if($mahasiswas->prodi_id == 11) selected @else disabled @endif >D III AKUNTANSI</option>
                            <option value="12" @if($mahasiswas->prodi_id == 12) selected @else disabled @endif >D III AKUNTANSI ALIH PROGRAM</option>
                            <option value="13" @if($mahasiswas->prodi_id == 13) selected @else disabled @endif >D IV AKUNTANSI </option>
                            <option value="14" @if($mahasiswas->prodi_id == 14) selected @else disabled @endif >D IV AKUNTANSI ALIH PROGRAM (Non Akt) </option>
                            <option value="15" @if($mahasiswas->prodi_id == 15) selected @else disabled @endif >D IV AKUNTANSI ALIH PROGRAM (Akt) </option>
                            <option value="21" @if($mahasiswas->prodi_id == 21) selected @else disabled @endif >D III PAJAK </option>
                            <option value="22" @if($mahasiswas->prodi_id == 22) selected @else disabled @endif >D III PAJAK ALIH PROGRAM </option>
                            <option value="23" @if($mahasiswas->prodi_id == 23) selected @else disabled @endif >D III PBB/PENILAI </option>
                            <option value="24" @if($mahasiswas->prodi_id == 24) selected @else disabled @endif >D III PBB/PENILAI ALIH PROGRAM 2019 </option>
                            <option value="25" @if($mahasiswas->prodi_id == 25) selected @else disabled @endif >D III PBB/PENILAI ALIH PROGRAM 2018 </option>
                            <option value="31" @if($mahasiswas->prodi_id == 31) selected @else disabled @endif >D III KEPABEANAN DAN CUKAI </option>
                            <option value="32" @if($mahasiswas->prodi_id == 32) selected @else disabled @endif >D III KEPABEANAN DAN CUKAI ALIH PROGRAM </option>
                            <option value="41" @if($mahasiswas->prodi_id == 41) selected @else disabled @endif >D III KEBENDAHARAAN NEGARA </option>
                            <option value="42" @if($mahasiswas->prodi_id == 42) selected @else disabled @endif >D III KEBENDAHARAAN NEGARA ALIH PROGRAM</option>
                            <option value="43" @if($mahasiswas->prodi_id == 43) selected @else disabled @endif >D III MANAJEMEN ASET </option>
                        </select>
                                {{-- <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  > --}}

                                @error('prodi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Jenis Kelamin<label>
                    </div>
                    <div class="form-group row">

                        @if($mahasiswas->jenis_kelamin == NULL)
                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin"  disabled>
                                <span class="design"></span>
                                <span class="text">Laki - Laki</span>
                            </label>

                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" disabled>
                                <span class="design"></span>
                                <span class="text">Perempuan</span>
                            </label>
                        @elseif($mahasiswas->jenis_kelamin == "laki-laki")
                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" checked>
                                <span class="design"></span>
                                <span class="text">Laki - Laki</span>
                            </label>

                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" disabled>
                                <span class="design"></span>
                                <span class="text">Perempuan</span>
                            </label>
                        @else
                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" disabled>
                                <span class="design"></span>
                                <span class="text">Laki - Laki</span>
                            </label>

                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" checked>
                                <span class="design"></span>
                                <span class="text">Perempuan</span>
                            </label>
                        @endif

                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Ayah (Menggunakan kapital di setiap awal kata dan tanpa gelar)<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama_ayah" type="text" class="form-control col-md-12 auth-input @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ $toga->nama_ayah ?? '' }}" required autocomplete="nama_ayah"  readonly >

                                @error('nama_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Ibu <label>
                    </div>
                    <div class="form-group row">
                                <input id="nama_ibu" type="text" class="form-control col-md-12 auth-input @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ $toga->nama_ibu ?? '' }}" required autocomplete="nama_ibu"  readonly >

                                @error('nama_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    </form>

                @else
                @if ( $mahasiswas->status_registrasi == 0 )

                <div class="home-card-step">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-caption">Isi Data</div>
                    </div>
                    <div class="step">
                        <div class="step-number non-active-number">2</div>
                        <div class="step-caption non-active-caption">Kunci Data</div>
                    </div>
                </div>

                <form action="/createRegistrasi" class="form-auth col-md-10" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <div class="home-card-title">
                        Silakan Isi Data Berikut
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">NPM<label>
                    </div>
                    <div class="form-group row">
                                <input id="npm" type="text" class="form-control col-md-12 auth-input-locked @error('npm') is-invalid @enderror" name="npm" value="{{ $mahasiswas->npm ?? '' }}" required autocomplete="npm" readonly >

                                @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>


                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Lengkap (Menggunakan kapital di setiap awal kata)<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama" type="text" class="form-control col-md-12 auth-input @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswas->nama ?? '' }}" required autocomplete="nama"  >

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Kelas (Contoh : 6-02)<label>
                    </div>
                    <div class="form-group row">
                                <input id="kelas" type="text" class="form-control col-md-12 auth-input @error('kelas') is-invalid @enderror" name="kelas" value="{{ $mahasiswas->kelas ?? '' }}" required autocomplete="kelas"  >

                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">No. Absen<label>
                    </div>
                    <div class="form-group row">
                                <input id="absen" type="text" class="form-control col-md-12 auth-input @error('absen') is-invalid @enderror" name="absen" value="{{ $mahasiswas->absen ?? '' }}" required autocomplete="absen"  >

                                @error('absen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Program Studi<label>
                    </div>
                    <div class="form-group row">
                        <select id="prodi_id" name="prodi_id" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror">
                            <option value="11" @if($mahasiswas->prodi_id == 11) selected @endif >D III AKUNTANSI</option>
                            <option value="12" @if($mahasiswas->prodi_id == 12) selected @endif >D III AKUNTANSI ALIH PROGRAM</option>
                            <option value="13" @if($mahasiswas->prodi_id == 13) selected @endif >D IV AKUNTANSI </option>
                            <option value="14" @if($mahasiswas->prodi_id == 14) selected @endif >D IV AKUNTANSI ALIH PROGRAM (Non Akt) </option>
                            <option value="15" @if($mahasiswas->prodi_id == 15) selected @endif >D IV AKUNTANSI ALIH PROGRAM (Akt) </option>
                            <option value="21" @if($mahasiswas->prodi_id == 21) selected @endif >D III PAJAK </option>
                            <option value="22" @if($mahasiswas->prodi_id == 22) selected @endif >D III PAJAK ALIH PROGRAM </option>
                            <option value="23" @if($mahasiswas->prodi_id == 23) selected @endif >D III PBB/PENILAI </option>
                            <option value="24" @if($mahasiswas->prodi_id == 24) selected @endif >D III PBB/PENILAI ALIH PROGRAM 2019 </option>
                            <option value="25" @if($mahasiswas->prodi_id == 25) selected @endif >D III PBB/PENILAI ALIH PROGRAM 2018 </option>
                            <option value="31" @if($mahasiswas->prodi_id == 31) selected @endif >D III KEPABEANAN DAN CUKAI </option>
                            <option value="32" @if($mahasiswas->prodi_id == 32) selected @endif >D III KEPABEANAN DAN CUKAI ALIH PROGRAM </option>
                            <option value="41" @if($mahasiswas->prodi_id == 41) selected @endif >D III KEBENDAHARAAN NEGARA </option>
                            <option value="42" @if($mahasiswas->prodi_id == 42) selected @endif >D III KEBENDAHARAAN NEGARA ALIH PROGRAM</option>
                            <option value="43" @if($mahasiswas->prodi_id == 43) selected @endif >D III MANAJEMEN ASET </option>
                        </select>
                                {{-- <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  > --}}

                                @error('prodi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Jenis Kelamin<label>
                    </div>
                    <div class="form-group row">

                        @if($mahasiswas->jenis_kelamin == NULL)
                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin"  value="laki-laki">
                                <span class="design"></span>
                                <span class="text">Laki - Laki</span>
                            </label>

                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" value="perempuan" >
                                <span class="design"></span>
                                <span class="text">Perempuan</span>
                            </label>
                        @elseif($mahasiswas->jenis_kelamin == "laki-laki")
                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin"  value="laki-laki" checked>
                                <span class="design"></span>
                                <span class="text">Laki - Laki</span>
                            </label>

                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" value="perempuan" >
                                <span class="design"></span>
                                <span class="text">Perempuan</span>
                            </label>
                        @else
                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" value="laki-laki">
                                <span class="design"></span>
                                <span class="text">Laki - Laki</span>
                            </label>

                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" value="perempuan" checked>
                                <span class="design"></span>
                                <span class="text">Perempuan</span>
                            </label>
                        @endif

                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Ayah (Menggunakan kapital di setiap awal kata dan tanpa gelar)<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama_ayah" type="text" class="form-control col-md-12 auth-input @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ $toga->nama_ayah ?? '' }}" required autocomplete="nama_ayah"  >

                                @error('nama_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Ibu (Menggunakan kapital di setiap awal kata dan tanpa gelar)<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama_ibu" type="text" class="form-control col-md-12 auth-input @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ $toga->nama_ibu ?? '' }}" required autocomplete="nama_ibu"  >

                                @error('nama_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle" style="margin-top:20px">
                        <label class="text-md-center">Pas Foto dengan <a class="btn-link-verif" data-toggle="modal" data-target="#exampleModal">ketentuan</a><label>
                    </div>
                    <div class="form-group row">
                        <div class="file-drop-area col-md-12">
                            <span class="fake-btn" id="fake-btn"><i class="far fa-file-image"></i> Choose files</span>
                            <span class="file-msg js-set-number" id="file-msg">or drag and drop files here</span>
                            @if(is_null($mahasiswas->foto))
                                <input id="file-input" type="file" class="form-control col-md-12 file-input @error('image') is-invalid @enderror" name="image" required autocomplete="image">
                            @else
                                <input id="file-input" type="file" class="form-control col-md-12 file-input @error('image') is-invalid @enderror" name="image" value="{{ asset('foto/'.$prodis->nama_prodi.'/'.$mahasiswas->foto) }} " required autocomplete="foto">
                            @endif
                        </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                        <div class="form-group row" style="margin: 30px 0 18px 0">
                            <div class="btn-area col-md-12 text-md-center">
                                <button type="submit" class="btn-auth btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                </form>

                @elseif($mahasiswas->status_registrasi == 1)

                    <div class="home-card-step">
                        <div class="step">
                            <div class="step-number non-active-number">1</div>
                            <div class="step-caption non-active-caption">Isi Data</div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-caption">Kunci Data</div>
                        </div>
                    </div>

                    <form action="/lockRegistrasi" class="form-auth col-md-10" method="POST"  enctype="multipart/form-data">
                        @csrf

                        <div class="home-card-title col-md-12 justify-content-center">
                            <img src="foto/{{$prodis->nama_prodi ?? ''}}/{{$mahasiswas->foto  ?? ''}}" alt="{{$mahasiswas->nama}}" class="home-img col-md-6">
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">NPM<label>
                        </div>
                        <div class="form-group row">
                                    <input id="npm" type="text" class="form-control col-md-12 auth-input-locked @error('npm') is-invalid @enderror" name="npm" value="{{ $mahasiswas->npm ?? '' }}" required autocomplete="npm" readonly >

                                    @error('npm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>


                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Nama Lengkap (Menggunakan kapital di setiap awal kata)<label>
                        </div>
                        <div class="form-group row">
                                    <input id="nama" type="text" class="form-control col-md-12 auth-input @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswas->nama ?? '' }}" required autocomplete="nama" readonly  >

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Kelas (Contoh : 6-02)<label>
                        </div>
                        <div class="form-group row">
                                    <input id="kelas" type="text" class="form-control col-md-12 auth-input @error('kelas') is-invalid @enderror" name="kelas" value="{{ $mahasiswas->kelas ?? '' }}" required autocomplete="kelas" readonly  >

                                    @error('kelas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">No. Absen<label>
                        </div>
                        <div class="form-group row">
                                    <input id="absen" type="text" class="form-control col-md-12 auth-input @error('absen') is-invalid @enderror" name="absen" value="{{ $mahasiswas->absen ?? '' }}" required autocomplete="absen" readonly  >

                                    @error('absen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Program Studi<label>
                        </div>
                        <div class="form-group row">
                            <select id="prodi_id" name="prodi_id" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" readonly>
                                <option value="11" @if($mahasiswas->prodi_id == 11) selected @else disabled @endif >D III AKUNTANSI</option>
                                <option value="12" @if($mahasiswas->prodi_id == 12) selected @else disabled @endif >D III AKUNTANSI ALIH PROGRAM</option>
                                <option value="13" @if($mahasiswas->prodi_id == 13) selected @else disabled @endif >D IV AKUNTANSI </option>
                                <option value="14" @if($mahasiswas->prodi_id == 14) selected @else disabled @endif >D IV AKUNTANSI ALIH PROGRAM (Non Akt) </option>
                                <option value="15" @if($mahasiswas->prodi_id == 15) selected @else disabled @endif >D IV AKUNTANSI ALIH PROGRAM (Akt) </option>
                                <option value="21" @if($mahasiswas->prodi_id == 21) selected @else disabled @endif >D III PAJAK </option>
                                <option value="22" @if($mahasiswas->prodi_id == 22) selected @else disabled @endif >D III PAJAK ALIH PROGRAM </option>
                                <option value="23" @if($mahasiswas->prodi_id == 23) selected @else disabled @endif >D III PBB/PENILAI </option>
                                <option value="24" @if($mahasiswas->prodi_id == 24) selected @else disabled @endif >D III PBB/PENILAI ALIH PROGRAM 2019 </option>
                                <option value="25" @if($mahasiswas->prodi_id == 25) selected @else disabled @endif >D III PBB/PENILAI ALIH PROGRAM 2018 </option>
                                <option value="31" @if($mahasiswas->prodi_id == 31) selected @else disabled @endif >D III KEPABEANAN DAN CUKAI </option>
                                <option value="32" @if($mahasiswas->prodi_id == 32) selected @else disabled @endif >D III KEPABEANAN DAN CUKAI ALIH PROGRAM </option>
                                <option value="41" @if($mahasiswas->prodi_id == 41) selected @else disabled @endif >D III KEBENDAHARAAN NEGARA </option>
                                <option value="42" @if($mahasiswas->prodi_id == 42) selected @else disabled @endif >D III KEBENDAHARAAN NEGARA ALIH PROGRAM</option>
                                <option value="43" @if($mahasiswas->prodi_id == 43) selected @else disabled @endif >D III MANAJEMEN ASET </option>
                            </select>
                                    {{-- <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  > --}}

                                    @error('prodi_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Jenis Kelamin<label>
                        </div>
                        <div class="form-group row">

                            @if($mahasiswas->jenis_kelamin == NULL)
                                <label class="col-md-6">
                                    <input type="radio" name="jenis_kelamin"  disabled>
                                    <span class="design"></span>
                                    <span class="text">Laki - Laki</span>
                                </label>

                                <label class="col-md-6">
                                    <input type="radio" name="jenis_kelamin" disabled>
                                    <span class="design"></span>
                                    <span class="text">Perempuan</span>
                                </label>
                            @elseif($mahasiswas->jenis_kelamin == "laki-laki")
                                <label class="col-md-6">
                                    <input type="radio" name="jenis_kelamin" checked>
                                    <span class="design"></span>
                                    <span class="text">Laki - Laki</span>
                                </label>

                                <label class="col-md-6">
                                    <input type="radio" name="jenis_kelamin" disabled>
                                    <span class="design"></span>
                                    <span class="text">Perempuan</span>
                                </label>
                            @else
                                <label class="col-md-6">
                                    <input type="radio" name="jenis_kelamin" disabled>
                                    <span class="design"></span>
                                    <span class="text">Laki - Laki</span>
                                </label>

                                <label class="col-md-6">
                                    <input type="radio" name="jenis_kelamin" checked>
                                    <span class="design"></span>
                                    <span class="text">Perempuan</span>
                                </label>
                            @endif

                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Nama Ayah (Menggunakan kapital di setiap awal kata dan tanpa gelar)<label>
                        </div>
                        <div class="form-group row">
                                    <input id="nama_ayah" type="text" class="form-control col-md-12 auth-input @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ $toga->nama_ayah ?? '' }}" required autocomplete="nama_ayah"  readonly >

                                    @error('nama_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Nama Ibu (Menggunakan kapital di setiap awal kata dan tanpa gelar)<label>
                        </div>
                        <div class="form-group row">
                                    <input id="nama_ibu" type="text" class="form-control col-md-12 auth-input @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ $toga->nama_ibu ?? '' }}" required autocomplete="nama_ibu"  readonly >

                                    @error('nama_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="agreement form-group row col-md-12">
                            <input type="checkbox" id="aggreement" name="aggreement" class="agreement-check" required value="Donut">
                            <label for="aggreement"  class="agreement-label">Dengan mengunci data, saya menyatakan bahwa data yang saya isi benar adanya dan bersedia dipergunakan untuk keperluan Wisuda Akbar PKN STAN 2021</label><br>
                        </div>

                        <div class="form-group row justify-content-between" style="margin: 30px 0 18px 0">
                                <div class="btn-area col-md-6 text-md-left">
                                    <a href="{{ route('editregistrasi') }}" class="btn-auth-secondary btn-secondary">
                                        {{ __('Ubah Data') }} <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <div class="btn-area col-md-6 text-md-right">
                                    <button type="submit" class="btn-auth btn-primary">
                                        {{ __('Kunci Data') }} <i class="fas fa-lock"></i>
                                    </button>
                                </div>
                            </div>
                    </form>
                @else

                <div class="locked col-md-12 text-md-right">
                    <i class="fas fa-lock"></i>
                </div>

                <form action="/lockRegistrasi" class="form-auth col-md-10" style="border-top:none" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <div class="home-card-title col-md-12 justify-content-center">
                        <img src="foto/{{$prodis->nama_prodi ?? ''}}/{{$mahasiswas->foto  ?? ''}}" alt="{{$mahasiswas->nama}}" class="home-img col-md-6">
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">NPM<label>
                    </div>
                    <div class="form-group row">
                                <input id="npm" type="text" class="form-control col-md-12 auth-input @error('npm') is-invalid @enderror" name="npm" value="{{ $mahasiswas->npm ?? '' }}" required autocomplete="npm" readonly >

                                @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>


                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Lengkap (Menggunakan kapital di setiap awal kata)<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama" type="text" class="form-control col-md-12 auth-input @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswas->nama ?? '' }}" required autocomplete="nama" readonly  >

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Kelas (Contoh : 6-02)<label>
                    </div>
                    <div class="form-group row">
                                <input id="kelas" type="text" class="form-control col-md-12 auth-input @error('kelas') is-invalid @enderror" name="kelas" value="{{ $mahasiswas->kelas ?? '' }}" required autocomplete="kelas" readonly  >

                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">No. Absen<label>
                    </div>
                    <div class="form-group row">
                                <input id="absen" type="text" class="form-control col-md-12 auth-input @error('absen') is-invalid @enderror" name="absen" value="{{ $mahasiswas->absen ?? '' }}" required autocomplete="absen" readonly  >

                                @error('absen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Program Studi<label>
                    </div>
                    <div class="form-group row">
                        <select id="prodi_id" name="prodi_id" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" readonly>
                            <option value="11" @if($mahasiswas->prodi_id == 11) selected @else disabled @endif >D III AKUNTANSI</option>
                            <option value="12" @if($mahasiswas->prodi_id == 12) selected @else disabled @endif >D III AKUNTANSI ALIH PROGRAM</option>
                            <option value="13" @if($mahasiswas->prodi_id == 13) selected @else disabled @endif >D IV AKUNTANSI </option>
                            <option value="14" @if($mahasiswas->prodi_id == 14) selected @else disabled @endif >D IV AKUNTANSI ALIH PROGRAM (Non Akt) </option>
                            <option value="15" @if($mahasiswas->prodi_id == 15) selected @else disabled @endif >D IV AKUNTANSI ALIH PROGRAM (Akt) </option>
                            <option value="21" @if($mahasiswas->prodi_id == 21) selected @else disabled @endif >D III PAJAK </option>
                            <option value="22" @if($mahasiswas->prodi_id == 22) selected @else disabled @endif >D III PAJAK ALIH PROGRAM </option>
                            <option value="23" @if($mahasiswas->prodi_id == 23) selected @else disabled @endif >D III PBB/PENILAI </option>
                            <option value="24" @if($mahasiswas->prodi_id == 24) selected @else disabled @endif >D III PBB/PENILAI ALIH PROGRAM 2019 </option>
                            <option value="25" @if($mahasiswas->prodi_id == 25) selected @else disabled @endif >D III PBB/PENILAI ALIH PROGRAM 2018 </option>
                            <option value="31" @if($mahasiswas->prodi_id == 31) selected @else disabled @endif >D III KEPABEANAN DAN CUKAI </option>
                            <option value="32" @if($mahasiswas->prodi_id == 32) selected @else disabled @endif >D III KEPABEANAN DAN CUKAI ALIH PROGRAM </option>
                            <option value="41" @if($mahasiswas->prodi_id == 41) selected @else disabled @endif >D III KEBENDAHARAAN NEGARA </option>
                            <option value="42" @if($mahasiswas->prodi_id == 42) selected @else disabled @endif >D III KEBENDAHARAAN NEGARA ALIH PROGRAM</option>
                            <option value="43" @if($mahasiswas->prodi_id == 43) selected @else disabled @endif >D III MANAJEMEN ASET </option>
                        </select>
                                {{-- <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  > --}}

                                @error('prodi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Jenis Kelamin<label>
                    </div>
                    <div class="form-group row">

                        @if($mahasiswas->jenis_kelamin == NULL)
                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin"  disabled>
                                <span class="design"></span>
                                <span class="text">Laki - Laki</span>
                            </label>

                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" disabled>
                                <span class="design"></span>
                                <span class="text">Perempuan</span>
                            </label>
                        @elseif($mahasiswas->jenis_kelamin == "laki-laki")
                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" checked>
                                <span class="design"></span>
                                <span class="text">Laki - Laki</span>
                            </label>

                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" disabled>
                                <span class="design"></span>
                                <span class="text">Perempuan</span>
                            </label>
                        @else
                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" disabled>
                                <span class="design"></span>
                                <span class="text">Laki - Laki</span>
                            </label>

                            <label class="col-md-6">
                                <input type="radio" name="jenis_kelamin" checked>
                                <span class="design"></span>
                                <span class="text">Perempuan</span>
                            </label>
                        @endif

                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Ayah (Menggunakan kapital di setiap awal kata dan tanpa gelar)</label>
                    </div>
                    <div class="form-group row">
                                <input id="nama_ayah" type="text" class="form-control col-md-12 auth-input @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ $toga->nama_ayah ?? '' }}" required autocomplete="nama_ayah"  readonly >

                                @error('nama_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Ibu (Menggunakan kapital di setiap awal kata dan tanpa gelar)<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama_ibu" type="text" class="form-control col-md-12 auth-input @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ $toga->nama_ibu ?? '' }}" required autocomplete="nama_ibu"  readonly >

                                @error('nama_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    </form>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog rounded border-0" role="document">
      <div class="modal-content rounded border-0">
        <div class="modal-header header-popup">
          <h5 class="modal-title title-popup"id="exampleModalLabel">Ketentuan Pas Foto</h5>
          <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <br>
            <ol>
                <li>Foto adalah foto formal menggunakan kemeja berwarna putih, kerudung berwarna hitam (bagi yang menggunakan krudung) dan dasi hitam (opsional).</li>
                <li>Untuk wanita yang tidak berjilbab, rambut dapat dikuncir atau digerai. Bagi wanita yang berjilbab, jilbab dapat dibuat menjuntai menutupi bagian dada ataupun tidak. Bagi laki-laki, potongan rambut rapi.</li>
                <li>Foto menggunakan <i>background</i> berwarna biru.  Jika calon wisudawan menyunting foto dengan Aplikasi Editing Foto dapat menyunting background dengan kode warna #0A01FF <span class="badge" style="background-color: #0A01FF"> &nbsp;</span>.</li>
                <li>Ukuran foto 3x4 dengan ukuran <i>file</i> <b>maksimal 1 MB</b>.</li>
            </ol>
            <div class="col-md-12">
                Berikut contoh foto sesuai ketentuan <br><br>
                <div class="col-md-12 d-flex">
                    <div class="col-md-6 text-md-left">
                        <img src="{{ asset('img/contoh pas foto 1.png') }}" class="col-md-12" alt="">
                    </div>
                    <div class="col-md-6 text-md-left">
                        <img src="{{ asset('img/contoh pas foto 2.png') }}" class="col-md-12" alt="">
                    </div>
                </div> <br>
                <div class="col-md-12">
                    <div class="col-md-6 text-md-left">
                        <img src="{{ asset('img/contoh pas foto 3.png') }}" class="col-md-12" alt="">
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>




<script>

var fileinput = document.querySelector('.file-input');
var filedroparea = document.querySelector('.file-drop-area');
var jssetnumber = document.querySelector('.js-set-number');
fileinput.addEventListener('dragenter', isactive);
fileinput.addEventListener('focus', isactive);
fileinput.addEventListener('click', isactive);

// back to normal state
fileinput.addEventListener('dragleave', isactive);
fileinput.addEventListener('blur', isactive);
fileinput.addEventListener('drop', isactive);

// add Class
function isactive() {
  filedroparea.classList.add('is-active');
}

// change inner text
fileinput.addEventListener('change', function() {
  var count = fileinput.files.length;
  if (count === 1) {
    // if single file then show file name
    jssetnumber.innerText = fileinput.value.split('\\').pop();
  } else {
    // otherwise show number of files
    jssetnumber.innerText = count + ' files selected';
  }
});

</script>
@endsection
