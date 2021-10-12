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
                                <li><a href="{{ route('tu.data') }}" class="nav-link unstyled" aria-current="page">Data</a></li>
                                <li><a href="{{ route('tu.tambahData') }}" class="nav-link unstyled" aria-current="page">Tambah Data</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-toggle rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#rpi" aria-expanded="false">Rekap Pengajuan Inventaris
                        </button>
                        <div class="collapse" id="rpi">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('tu.dataPengajuan') }}" class="nav-link unstyled" aria-current="page">Data</a></li>
                                <li><a href="{{ route('tu.tambahDataPengajuan') }}" class="nav-link unstyled" aria-current="page">Tambah Data</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-toggle rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#rphi" aria-expanded="false">Rekap Penghapusan Inventaris
                        </button>
                        <div class="collapse show" id="rphi">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('tu.dataPenghapusan') }}" class="nav-link unstyled  text-dark navbar-active" aria-current="page">Data - <span class="fw-bold">Tambah Data</span></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="container-fluid m-5">
                <a href="{{ route('tu.dataPenghapusan') }}">
                    <button class="btn btn-sm btn-outline-dark mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                            <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                            <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
                        </svg>
                        Kembali
                    </button>
                </a>
                <div class="card">
                    <h3 class="text-center m-3">
                        Penghapusan Inventaris {{ $data->unit_kerja }}
                        <span class="fw-bold text-success"></span>
                    </h3>
                    <hr>
                    <div class="card-body">
                        <form method="post" action="{{route('tu.prosTambahDataPenghapusan')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_inventaris" class="form-label">Nama Inventaris</label>
                                <input name="id" class="form-control" type="text" value="{{ $data->id }}" aria-label="readonly input example" hidden>
                                <input name="nama_inventaris" class="form-control" type="text" value="{{ $data->nama_inventaris }}" aria-label="readonly input example" readonly>
                                @error('nama_inventaris')
                                <div id="nama_inventaris" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_sebelum" class="form-label">Jumlah saat ini</label>
                                <input name="jumlah_sebelum" id="jumlah_ini" value="{{ $data->jumlah_inventaris }}"  class="form-control text-capitalize @error('jumlah_sebelum') is-invalid @enderror" type="text" aria-label="default input example" autocomplete="off" required readonly >
                                @error('jumlah_sebelum')
                                <div id="satuan" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="jumlah_hapus" class="form-label">Jumlah Hapus</label>
                                    <input name="jumlah_hapus" id="jumlah_hapus" onchange="calculateAmount(this.value)" class="form-control text-capitalize @error('jumlah_hapus') is-invalid @enderror" type="text" aria-label="default input example" autocomplete="off" required >
                                    @error('jumlah_hapus')
                                    <div id="satuan" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col mb-3">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <input name="satuan" value="{{ $data->satuan }}" class="form-control text-capitalize @error('satuan') is-invalid @enderror" type="text" aria-label="default input example" autocomplete="off" required readonly >
                                    @error('satuan')
                                    <div id="satuan" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_setelah" class="form-label">Jumlah setelah dihapus</label>
                                    <input name="jumlah_setelah" id="jumlah_setelah" class="form-control text-capitalize @error('jumlah_setelah') is-invalid @enderror" type="text" aria-label="default input example" autocomplete="off" required readonly >
                                    @error('jumlah_setelah')
                                    <div id="satuan" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Kondisi</label>
                                    <input name="keterangan" value="{{ $data->keterangan_inventaris }}"  class="form-control text-capitalize @error('keterangan') is-invalid @enderror" type="text" aria-label="default input example" autocomplete="off" required readonly >
                                    @error('keterangan')
                                    <div id="satuan" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button id="tambah-data" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

