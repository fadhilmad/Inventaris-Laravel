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
                            <button class="btn btn-toggle align-items-center text-dark navbar-active">Data User</button>
                        </a>
                    </li>
                    <li>
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#rli" aria-expanded="false">Rekap Laporan Inventaris
                        </button>
                        <div class="collapse" id="rli">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('admin.rekapLaporanProdi') }}" class="nav-link unstyled" aria-current="page">Program Studi</a></li>
                                <li><a href="{{ route('admin.rekapLaporanFakultas') }}" class="nav-link unstyled" aria-current="page">Fakultas</a></li>
                                <li><a href="{{ route('admin.rekapLaporanBiro') }}" class="nav-link unstyled" aria-current="page">Biro & Unit</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-toggle rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#rpi" aria-expanded="false">Rekap Pengajuan Inventaris
                        </button>
                        <div class="collapse" id="rpi">
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
                        <div class="collapse" id="rpei">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('admin.rekapPenghapusanProdi') }}" class="nav-link unstyled" aria-current="page">Program Studi</a></li>
                                <li><a href="{{ route('admin.rekapPenghapusanFakultas') }}" class="nav-link unstyled" aria-current="page">Fakultas</a></li>
                                <li><a href="{{ route('admin.rekapPenghapusanBiro') }}" class="nav-link unstyled" aria-current="page">Biro & Unit</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="container-fluid m-5">
                <h4>Tambah Akun User</h4>
                <hr>
                <form method="post" action="{{route('prosTambahUser')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <input name="user_id" value="{{ old('user_id') }}" class="form-control text-capitalize @error('user_id') is-invalid @enderror" type="number" aria-label="default input example" required>
                        @error('user_id')
                        <div id="user_id" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input name="name" value="{{ old('name') }}" class="form-control text-capitalize @error('name') is-invalid @enderror" type="text" required>
                        @error('name')
                        <div id="name" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select class="jabatan form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" >
                            <option></option>
                            <option value="tu">Tata Usaha</option>
                            <option value="kaprodi">Kaprodi</option>
                            <option value="wr">Wakil Rektor</option>
                            <option value="inventaris">Inventaris</option>
                            <option value="pplp">PPLP</option>
                        </select>
                        @error('jabatan')
                        <div id="jabatan" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="unit_kerja" class="form-label">Unit Kerja</label>
                        <select class="unit_kerja form-control @error('unit_kerja') is-invalid @enderror" name="unit_kerja" value="{{ old('unit_kerja') }}">
                            <option></option>
                            <option value="Biro Administrasi Akademik dan Kemahasiswaan">Biro Administrasi Akademik dan Kemahasiswaan</option>
                            <option value="Biro Administrasi Umum ">Biro Administrasi Umum</option>
                            <option value="Biro Alumni dan Tracer Study">Biro Alumni dan Tracer Study</option>
                            <option value="Biro Kemahasiswaan">Biro Kemahasiswaan</option>
                            <option value="Biro Kepegawaian">Biro Kepegawaian</option>
                            <option value="Biro Kerjasama dan Humas">Biro Kerjasama dan Humas</option>
                            <option value="Biro Keuangan">Biro Keuangan</option>
                            <option value="Biro Penerimaan Mahasiswa Baru">Biro Penerimaan Mahasiswa Baru</option>
                            <option value="Biro Publikasi Ilmiah">Biro Publikasi Ilmiah</option>
                            <option value="Biro Sarana dan Prasarana">Biro Sarana dan Prasarana</option>
                            <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                            <option value="Fakultas Hukum">Fakultas Hukum</option>
                            <option value="Fakultas Ilmu Kesehatan dan Sains">Fakultas Ilmu Kesehatan dan Sains</option>
                            <option value="Fakultas Keguruan dan Ilmu Pendidikan">Fakultas Keguruan dan Ilmu Pendidikan</option>
                            <option value="Fakultas Teknik">Fakultas Teknik</option>
                            <option value="Prodi Akuntansi">Prodi Akuntansi</option>
                            <option value="Prodi Bimbingan Konseling">Prodi Bimbingan Konseling</option>
                            <option value="Prodi D3 Manajemen Pajak">Prodi D3 Manajemen Pajak</option>
                            <option value="Prodi Farmasi">Prodi Farmasi</option>
                            <option value="Prodi Hukum">Prodi Hukum</option>
                            <option value="Prodi Ilmu Keolahragaan">Prodi Ilmu Keolahragaan</option>
                            <option value="Prodi Manajemen">Prodi Manajemen</option>
                            <option value="Prodi Pascasarjana Pendidikan Ilmu Bahasa dan Sastra Indonesia">Prodi Pascasarjana Pendidikan Ilmu Bahasa dan Sastra Indonesia</option>
                            <option value="Prodi Pascasarjana Pendidikan Ilmu Pengetahuan Sosial">Prodi Pascasarjana Pendidikan Ilmu Pengetahuan Sosial</option>
                            <option value="Prodi Pendidikan Akuntansi">Prodi Pendidikan Akuntansi</option>
                            <option value="Prodi Pendidikan Bahasa dan Sastra Indonesia">Prodi Pendidikan Bahasa dan Sastra Indonesia</option>
                            <option value="Prodi Pendidikan Bahasa Inggris">Prodi Pendidikan Bahasa Inggris</option>
                            <option value="Prodi Pendidikan Biologi">Prodi Pendidikan Biologi</option>
                            <option value="Prodi Pendidikan Ekonomi">Prodi Pendidikan Ekonomi</option>
                            <option value="Prodi Pendidikan Fisika">Prodi Pendidikan Fisika</option>
                            <option value="Prodi Pendidikan Guru Pendidikan Anak Usia Dini">Prodi Pendidikan Guru Pendidikan Anak Usia Dini</option>
                            <option value="Prodi Pendidikan Guru Sekolah Dasar">Prodi Pendidikan Guru Sekolah Dasar</option>
                            <option value="Prodi Pendidikan Matematika">Prodi Pendidikan Matematika</option>
                            <option value="Prodi Pendidikan Pancasila dan Kewarganegaraan">Prodi Pendidikan Pancasila dan Kewarganegaraan</option>
                            <option value="Prodi Pendidikan Profesi Guru">Prodi Pendidikan Profesi Guru</option>
                            <option value="Prodi Pendidikan Sejarah">Prodi Pendidikan Sejarah</option>
                            <option value="Prodi Pendidikan Teknik Elektro">Prodi Pendidikan Teknik Elektro</option>
                            <option value="Prodi Sistem Informasi">Prodi Sistem Informasi</option>
                            <option value="Prodi Teknik Elektro">Prodi Teknik Elektro</option>
                            <option value="Prodi Teknik Industri">Prodi Teknik Industri</option>
                            <option value="Prodi Teknik Informatika">Prodi Teknik Informatika</option>
                            <option value="Prodi Teknik Kimia">Prodi Teknik Kimia</option>
                            <option value="UPT Bimbingan dan Konseling">UPT Bimbingan dan Konseling</option>
                            <option value="UPT Kewirausahaan">UPT Kewirausahaan</option>
                            <option value="UPT Komputer">UPT Komputer</option>
                            <option value="UPT Perpustakaan">UPT Perpustakaan</option>
                            <option value="UPT Poliklinik">UPT Poliklinik</option>
                            <option value="UPT Praktik Kependidikan">UPT Praktik Kependidikan</option>
                            <option value="UPT Pusat Pengembangan Bahasa">UPT Pusat Pengembangan Bahasa</option>
                            <option value="UPT Sistem Informasi dan Jaringan">UPT Sistem Informasi dan Jaringan</option>
                        </select>
                        @error('unit_kerja')
                        <div id="unit_kerja" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" value="{{ old('password') }}" class="form-control  @error('password') is-invalid @enderror" type="password" aria-label="default input example" required>
                        @error('password')
                        <div id="password" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-success me-2">Simpan</button>
                        <a href="{{ route('admin.dataUser') }}"><button type="button" class="btn btn-secondary">Batal</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
