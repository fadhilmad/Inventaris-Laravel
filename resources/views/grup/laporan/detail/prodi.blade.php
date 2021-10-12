@extends('layouts.navbar-header')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-white border-end" style="width: 250px;height: 100vh;">
                <ul class="nav nav-pills flex-column mb-auto">
                    @if(Auth::user()->hasRole('pplp'))
                        <li class="nav-item">
                            <a class="unstyled" href="{{ route('pplp.dashboard') }}">
                                <button class="btn btn-toggle align-items-center">Beranda</button>
                            </a>
                        </li>
                        <li>
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#rli" aria-expanded="false">Laporan Inventaris
                            </button>
                            <div class="collapse " id="rli">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="{{ route('pplp.laporanProdi') }}" class="nav-link unstyled text-dark navbar-active" aria-current="page">Program Studi - <span class="fw-bold">Detail</span></a></li>
                                    <li><a href="{{ route('pplp.laporanFakultas') }}" class="nav-link unstyled" aria-current="page">Fakultas</a></li>
                                    <li><a href="{{ route('pplp.laporanBiro') }}" class="nav-link unstyled" aria-current="page">Biro</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#rpei" aria-expanded="false">Penghapusan Inventaris
                            </button>
                            <div class="collapse show" id="rpei">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="{{ route('pplp.penghapusanProdi') }}" class="nav-link unstyled" aria-current="page">Program Studi</a></li>
                                    <li><a href="{{ route('pplp.penghapusanFakultas') }}" class="nav-link unstyled" aria-current="page">Fakultas</a></li>
                                    <li><a href="{{ route('pplp.penghapusanBiro') }}" class="nav-link unstyled" aria-current="page">Biro</a></li>
                                </ul>
                            </div>
                        </li>
                    @elseif(Auth::user()->hasRole('inventaris'))
                        <li class="nav-item">
                            <a class="unstyled" href="{{ route('inventaris.dashboard') }}">
                                <button class="btn btn-toggle align-items-center">Beranda</button>
                            </a>
                        </li>
                        <li>
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#rli" aria-expanded="false">Laporan Inventaris
                            </button>
                            <div class="collapse " id="rli">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="{{ route('inventaris.laporanProdi') }}" class="nav-link unstyled text-dark navbar-active" aria-current="page">Program Studi - <span class="fw-bold">Detail</span></a></li>
                                    <li><a href="{{ route('inventaris.laporanFakultas') }}" class="nav-link unstyled" aria-current="page">Fakultas</a></li>
                                    <li><a href="{{ route('inventaris.laporanBiro') }}" class="nav-link unstyled" aria-current="page">Biro</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#rpei" aria-expanded="false">Penghapusan Inventaris
                            </button>
                            <div class="collapse show" id="rpei">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="{{ route('inventaris.penghapusanProdi') }}" class="nav-link unstyled " aria-current="page">Program Studi</a></li>
                                    <li><a href="{{ route('inventaris.penghapusanFakultas') }}" class="nav-link unstyled " aria-current="page">Fakultas</a></li>
                                    <li><a href="{{ route('inventaris.penghapusanBiro') }}" class="nav-link unstyled" aria-current="page">Biro</a></li>
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="container-fluid m-5">
                <a href="{{ url()->previous() }}">
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
                        Rekapitulasi Laporan Inventaris
                        <span class="fw-bold text-success">{{ $data->first()->unit_kerja }}</span>
                    </h3>
                    <hr>
                    <div class="card-body">
                        <table id="table2" class="table table-striped display " style="width:100%">
                            <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Inventaris</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Tahun</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $data as $v )
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v->nama_inventaris }}</td>
                                    <td>{{ $v->jumlah_inventaris }}</td>
                                    <td>{{ $v->satuan }}</td>
                                    <td>{{ $v->tahun }}</td>
                                    <td>{{ $v->keterangan_inventaris }}</td>
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
