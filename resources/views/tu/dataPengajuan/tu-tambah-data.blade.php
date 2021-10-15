@extends('layouts.navbar-header')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-white border-end" style="width: 250px;height: 100vh;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a class="unstyled" href="{{ route('tu.dashboard') }}">
                            <button class="btn btn-toggle align-items-center">Beranda</button>
                        </a>
                    </li>
                    <li>
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#rli" aria-expanded="false">Data Inventaris
                        </button>
                        <div class="collapse " id="rli">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('tu.data') }}" class="nav-link unstyled " aria-current="page">Data</a></li>
                                <li><a href="{{ route('tu.tambahData') }}" class="nav-link unstyled " aria-current="page">Tambah Data</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-toggle rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#rpi" aria-expanded="false">Rekap Pengajuan Inventaris
                        </button>
                        <div class="collapse show" id="rpi">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('tu.dataPengajuan') }}" class="nav-link unstyled" aria-current="page">Data</a></li>
                                <li><a href="{{ route('tu.tambahDataPengajuan') }}" class="nav-link unstyled text-dark navbar-active" aria-current="page">Tambah Data</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-toggle rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#rphi" aria-expanded="false">Rekap Penghapusan Inventaris
                        </button>
                        <div class="collapse" id="rphi">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('tu.dataPenghapusan') }}" class="nav-link unstyled" aria-current="page">Data</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="container-fluid m-5">
                <div class="card">
                    <h3 class="text-center m-3">Tambah Data Pengajuan Inventaris {{ Auth::user()->unit_kerja }}</h3>
                    <hr>
                    <div class="card-body">
                        <form method="post" action="{{ route('tu.prosTambahDataPengajuan') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_inventaris" class="form-label">Nama Inventaris</label>
                                <input name="nama_inventaris" value="{{ old('nama_inventaris') }}" class="form-control text-capitalize @error('nama_inventaris') is-invalid @enderror" type="text" aria-label="default input example" required>
                                @error('nama_inventaris')
                                <div id="nama_inventaris" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="satuan" class="form-label">Satuan</label>
                                <input name="satuan" value="{{ old('satuan') }}" list="satuan" class="form-control text-capitalize @error('satuan') is-invalid @enderror" type="text" aria-label="default input example" autocomplete="off" required>
                                <datalist id="satuan">
                                    <option value="Unit">
                                    <option value="Buah">
                                    <option value="Pasang">
                                    <option value="Lembar">
                                    <option value="Keping">
                                    <option value="Batang">
                                    <option value="Bungkus">
                                    <option value="Potong">
                                    <option value="Tablet">
                                    <option value="Ekor">
                                    <option value="Tablet">
                                    <option value="Ekor">
                                    <option value="Rim">
                                    <option value="Karat">
                                    <option value="Butir">
                                    <option value="Roll">
                                    <option value="Dus">
                                    <option value="Karung">
                                    <option value="Koli">
                                    <option value="Sak">
                                    <option value="Bal">
                                    <option value="Kaleng">
                                    <option value="Set">
                                    <option value="Slop">
                                    <option value="Gulung">
                                    <option value="Ton">
                                    <option value="KiloGram">
                                    <option value="Gram">
                                    <option value="MiliGram">
                                    <option value="Meter">
                                    <option value="M2">
                                    <option value="M3">
                                    <option value="Inchi">
                                    <option value="Cc">
                                    <option value="Liter">
                                </datalist>
                                @error('satuan')
                                <div id="satuan" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jenis_pengajuan" class="form-label">Kondisi</label>
                                <input name="jenis_pengajuan" list="kondisi" value="{{ old('jenis_pengajuan') }}" class="form-control text-capitalize @error('jenis_pengajuan') is-invalid @enderror" type="text" aria-label="default input example" autocomplete="off" required>
                                <datalist id="kondisi">
                                    <option value="Baru">
                                    <option value="Lama">
                                </datalist>
                                @error('jenis_pengajuan')
                                <div id="jenis_pengajuan" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_inventaris" class="form-label">Jumlah</label>
                                <input name="jumlah_inventaris" value="{{ old('jumlah_inventaris') }}" class="form-control text-capitalize @error('jumlah_inventaris') is-invalid @enderror" type="number" aria-label="default input example" required>
                                @error('jumlah_inventaris')
                                <div id="jumlah_inventaris" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_inventaris" class="form-label">Tanggal Pengajuan</label>
                                <input class="form-control" type="text" value="{{ \Carbon\Carbon::now()->format('d-M-Y') }}" aria-label="readonly input example" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
