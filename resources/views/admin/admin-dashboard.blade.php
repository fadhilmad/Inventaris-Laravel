@extends('layouts.navbar-header')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-white border-end" style="width: 200px;height: 100vh;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active unstyled" aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link unstyled" aria-current="page">Data User</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link unstyled" aria-current="page">Rekap Laporan</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link unstyled" aria-current="page">Rekap Pengajuan Inventaris</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link unstyled" aria-current="page">Rekap Penghapusan Inventaris</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">Flex item 1</div>
                <div class="p-2 bd-highlight">Flex item 2</div>
                <div class="p-2 bd-highlight">Flex item 3</div>
            </div>
        </div>
    </div>
@endsection
