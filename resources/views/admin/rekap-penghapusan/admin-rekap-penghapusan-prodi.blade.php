@extends('layouts.navbar-header')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-white border-end" style="width: 250px;height: 100vh;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a class="unstyled" href="{{ route('admin.dashboard') }}">
                            <button class="btn btn-toggle align-items-center ">Beranda</button>
                        </a>
                    </li>
                    <li>
                        <a class="unstyled" href="{{ route('admin.dataUser') }}">
                            <button class="btn btn-toggle align-items-center">Data User</button>
                        </a>
                    </li>
                    <li>
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#rli" aria-expanded="false">Rekap Laporan Inventaris
                        </button>
                        <div class="collapse " id="rli">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('admin.rekapLaporanProdi') }}" class="nav-link unstyled " aria-current="page">Program Studi</a></li>
                                <li><a href="{{ route('admin.rekapLaporanFakultas') }}" class="nav-link unstyled" aria-current="page">Fakultas</a></li>
                                <li><a href="{{ route('admin.rekapLaporanBiro') }}" class="nav-link unstyled" aria-current="page">Biro & Unit</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-toggle rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#rpi" aria-expanded="false">Rekap Pengajuan Inventaris
                        </button>
                        <div class="collapse " id="rpi">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('admin.rekapPengajuanProdi') }}" class="nav-link unstyled" aria-current="page">Program Studi</a></li>
                                <li><a href="{{ route('admin.rekapPengajuanFakultas') }}" class="nav-link unstyled" aria-current="page">Fakultas</a></li>
                                <li><a href="{{ route('admin.rekapPengajuanBiro') }}" class="nav-link unstyled" aria-current="page">Biro & Unit</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#rpei" aria-expanded="false">Rekap Penghapusan Inventaris
                        </button>
                        <div class="collapse show" id="rpei">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('admin.rekapPenghapusanProdi') }}" class="nav-link unstyled text-dark navbar-active" aria-current="page">Program Studi</a></li>
                                <li><a href="{{ route('admin.rekapPenghapusanFakultas') }}" class="nav-link unstyled " aria-current="page">Fakultas</a></li>
                                <li><a href="{{ route('admin.rekapPenghapusanBiro') }}" class="nav-link unstyled" aria-current="page">Biro & Unit</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="container-fluid m-5">
                <div class="card">
                    <h3 class="text-center m-3">Rekapitulasi Penghapusan Inventaris Prodi</h3>
                    <hr>
                    <div class="card-body">
                        <table id="table1" class="table table-striped display nowrap" style="width:100%">
                            <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Inventaris</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Tahun Perolehan</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $daftar as $d )
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->nama_inventaris }}</td>
                                    <td>{{ $d->jumlah_hapus }}</td>
                                    <td>{{ $d->satuan }}</td>
                                    <td>{{ $d->tahun }}</td>
                                    <td>{{ $d->keterangan }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
