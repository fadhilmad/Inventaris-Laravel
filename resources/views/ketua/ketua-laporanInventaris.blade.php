@extends('layouts.navbar-header')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-white border-end" style="width: 250px;height: 100vh;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a class="unstyled" href="{{ route('ketua.dashboard') }}">
                            <button class="btn btn-toggle align-items-center">Beranda</button>
                        </a>
                    </li>
                    <li class="nav-item navbar-active">
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
                    <h3 class="text-center m-3">Laporan Inventaris</h3>
                    <hr>
                    <div class="card-body">
                        <div class="card-body">
                            <table id="table2" class="table table-striped display " style="width:100%">
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
                                @foreach($data as $v)
                                    <tr class="text-center text-capitalize">
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
    </div>
@endsection
