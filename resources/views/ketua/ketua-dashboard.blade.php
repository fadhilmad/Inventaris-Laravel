@extends('layouts.navbar-header')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-white border-end" style="width: 250px;height: 100vh;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item navbar-active">
                        <a class="unstyled" href="{{ route('ketua.dashboard') }}">
                            <button class="btn btn-toggle align-items-center">Beranda</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="unstyled" href="{{ route('ketua.laporanInventaris') }}">
                            <button class="btn btn-toggle align-items-center">Laporan Inventaris</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="unstyled" href="{{ route('ketua.pengajuanInventaris') }}">
                            <button class="btn btn-toggle align-items-center">Pengajuan Inventaris</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="unstyled" href="{{ route('ketua.penghapusanInventaris') }}">
                            <button class="btn btn-toggle align-items-center">Penghapusan Inventaris</button>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="container-fluid m-5">
                <div class="card">
                    <div class="card-body">Selamat Datang <span class="fw-bold">{{ Auth::user()->name }}</span>, Sebagai Ketua {{ Auth::user()->unit_kerja }} </div>
                </div>
            </div>
        </div>
    </div>
@endsection
