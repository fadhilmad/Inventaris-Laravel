@extends('layouts.navbar-header')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-white border-end" style="width: 250px;height: 100vh;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a class="unstyled" href="{{ route('admin.dashboard') }}">
                            <button class="btn btn-toggle align-items-center navbar-active">Beranda</button>
                        </a>
                    </li>
                    <li>
                        <a class="unstyled" href="{{ route('admin.dataUser') }}">
                            <button class="btn btn-toggle align-items-center ">Data User</button>
                        </a>
                    </li>
                    <li>
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#orders-collapse" aria-expanded="false">
                            Rekap Laporan Inventaris
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('admin.dataUser') }}" class="nav-link unstyled" aria-current="page">Data User</a></li>
                                <li><a href="{{ route('admin.dataUser') }}" class="nav-link unstyled" aria-current="page">Data User</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link unstyled" aria-current="page">Rekap Pengajuan Inventaris</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link unstyled" aria-current="page">Rekap Penghapusan Inventaris</a>
                    </li>
                </ul>
            </div>

            <div class="container-fluid m-5">
                <div class="card">
                    <div class="card-body">Selamat Datang <span class="fw-bold">{{ Auth::user()->name }}</span>, Sebagai Administrator </div>
                </div>
            </div>
        </div>
    </div>
@endsection
