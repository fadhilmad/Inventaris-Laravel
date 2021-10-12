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
                    <li class="nav-item">
                        <a class="unstyled" href="{{ route('ketua.laporanInventaris') }}">
                            <button class="btn btn-toggle align-items-center">Laporan Inventaris</button>
                        </a>
                    </li>
                    <li class="nav-item navbar-active">
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
                    <h3 class="text-center m-3">Pengajuan Inventaris</h3>
                    <hr>
                    <div class="card-body">
                        <div class="card-body">
                            <table id="table3" class="table table-striped display " style="width:100%">
                                <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Inventaris</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Jenis Pengajuan</th>
                                    <th hidden>Status Validasi</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $data as $d )
                                    <tr class="text-center align-middle text-capitalize">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama_inventaris }}</td>
                                        <td>{{ $d->jumlah_inventaris }}</td>
                                        <td>{{ $d->satuan }}</td>
                                        <td>{{ $d->jenis_pengajuan }}</td>
                                        <td hidden>
                                            @if( $d->validasi_ketua == '1' )
                                                <span class="badge rounded-pill bg-success">Tervalidasi</span>
                                            @else
                                                <span class="badge rounded-pill bg-danger">Belum Valid</span>
                                            @endif
                                        </td>
                                        <td>{{ $d->created_at->format('d M Y') }}</td>
                                        <td><input data-id="{{ $d->id }}" id="toggle1" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Valid" data-off="Tidak Valid" {{ $d->validasi_ketua ? 'checked' : '' }}></td>
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
