<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KetuaController;
use App\Http\Controllers\PplpController;
use App\Http\Controllers\TuController;
use App\Http\Controllers\WrController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', [HomeController::class, 'index']);

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::get('/logout', [LoginController::class, 'showLogout'])->name('logout');
});

//Admin
Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //data user
    Route::get('/admin/data/user', [AdminController::class, 'dataUser'])->name('admin.dataUser');
    Route::get('/admin/data/user/tambah', [AdminController::class, 'tambahDataUser'])->name('admin.tambahDataUser');

    Route::post('/prosTambahUser', [AdminController::class, 'prosTambahUser'])->name('prosTambahUser');


    //rekap laporan
    Route::get('/admin/rekap/laporan/prodi', [AdminController::class, 'rekapLaporanProdi'])->name('admin.rekapLaporanProdi');
    Route::get('/admin/rekap/laporan/fakultas', [AdminController::class, 'rekapLaporanFakultas'])->name('admin.rekapLaporanFakultas');
    Route::get('/admin/rekap/laporan/biro', [AdminController::class, 'rekapLaporanBiro'])->name('admin.rekapLaporanBiro');
    //detail
    Route::get('/admin/rekap/laporan/prodi/{id}/detail', [AdminController::class, 'detailRekapLaporanProdi'])->name('admin.detailRekapLaporanProdi');
    Route::get('/admin/rekap/laporan/fakultas/{id}/detail', [AdminController::class, 'detailRekapLaporanFakultas'])->name('admin.detailRekapLaporanFakultas');
    Route::get('/admin/rekap/laporan/biro/{id}/detail', [AdminController::class, 'detailRekapLaporanBiro'])->name('admin.detailRekapLaporanBiro');

    //rekap pengajuan
    Route::get('/admin/rekap/pengajuan/prodi', [AdminController::class, 'rekapPengajuanProdi'])->name('admin.rekapPengajuanProdi');
    Route::get('/admin/rekap/pengajuan/fakultas', [AdminController::class, 'rekapPengajuanFakultas'])->name('admin.rekapPengajuanFakultas');
    Route::get('/admin/rekap/pengajuan/biro', [AdminController::class, 'rekapPengajuanBiro'])->name('admin.rekapPengajuanBiro');
    //detail
    Route::get('/admin/rekap/pengajuan/prodi/{id}/detail', [AdminController::class, 'detailRekapPengajuanProdi'])->name('admin.detailRekapPengajuanProdi');
    Route::get('/admin/rekap/pengajuan/fakultas/{id}/detail', [AdminController::class, 'detailRekapPengajuanFakultas'])->name('admin.detailRekapPengajuanFakultas');
    Route::get('/admin/rekap/pengajuan/biro/{id}/detail', [AdminController::class, 'detailRekapPengajuanBiro'])->name('admin.detailRekapPengajuanBiro');


    //rekap penghapusan
    Route::get('/admin/rekap/penghapusan/prodi', [AdminController::class, 'rekapPenghapusanProdi'])->name('admin.rekapPenghapusanProdi');
    Route::get('/admin/rekap/penghapusan/fakultas', [AdminController::class, 'rekapPenghapusanFakultas'])->name('admin.rekapPenghapusanFakultas');
    Route::get('/admin/rekap/penghapusan/biro', [AdminController::class, 'rekapPenghapusanBiro'])->name('admin.rekapPenghapusanBiro');

});

//tu
Route::group(['middleware' => ['role:tu']], function () {

    Route::get('/tu/dashboard', [TuController::class, 'index'])->name('tu.dashboard');

    //data
    Route::get('/tu/data', [TuController::class, 'data'])->name('tu.data');
    Route::get('/tu/data/tambah', [TuController::class, 'tambahData'])->name('tu.tambahData');
    //pross
    Route::post('/tu/prosTambahData', [TuController::class, 'prosTambahData'])->name('tu.prosTambahData');

    //pengajuan
    Route::get('/tu/data/pengajuan', [TuController::class, 'dataPengajuan'])->name('tu.dataPengajuan');
    Route::get('/tu/data/tambah/pengajuan', [TuController::class, 'tambahDataPengajuan'])->name('tu.tambahDataPengajuan');
    //pross
    Route::post('/tu/prosTambahDataPengajuan', [TuController::class, 'prosTambahDataPengajuan'])->name('tu.prosTambahDataPengajuan');

    //penghapusan
    Route::get('/tu/data/penghapusan', [TuController::class, 'dataPenghapusan'])->name('tu.dataPenghapusan');
    Route::get('/tu/data/tambah/{id}/penghapusan', [TuController::class, 'tambahDataPenghapusan'])->name('tu.tambahDataPenghapusan');
    //pross
    Route::post('/tu/prosTambahDataPenghapusan', [TuController::class, 'prosTambahDataPenghapusan'])->name('tu.prosTambahDataPenghapusan');

});

//ketua
Route::group(['middleware' => ['role:ketua']], function () {

    Route::get('/ketua/dashboard', [KetuaController::class, 'index'])->name('ketua.dashboard');

    //laporan
    Route::get('/ketua/laporan/inventaris', [KetuaController::class, 'laporanInventaris'])->name('ketua.laporanInventaris');
    //pengajuan
    Route::get('/ketua/pengajuan/inventaris', [KetuaController::class, 'pengajuanInventaris'])->name('ketua.pengajuanInventaris');
    Route::get('/ketua/pengajuan/inventaris/validasi/{id}', [KetuaController::class, 'changeStatus'])->name('ketua.validasi');

    //penghapusan
    Route::get('/ketua/penghapusan/inventaris', [KetuaController::class, 'penghapusanInventaris'])->name('ketua.penghapusanInventaris');
    Route::get('/ketua/penghapusan/inventaris/validasi/{id}/{jumlah_setelah}', [KetuaController::class, 'changeStatusPenghapusan'])->name('ketua.validasiHapus');

});

//wr
Route::group(['middleware' => ['role:wr']], function () {

    Route::get('/wr/dashboard', [WrController::class, 'index'])->name('wr.dashboard');

    //laporan
    Route::get('/wr/laporan/prodi', [WrController::class, 'laporanProdi'])->name('wr.laporanProdi');
    Route::get('/wr/laporan/fakultas', [WrController::class, 'LaporanFakultas'])->name('wr.laporanFakultas');
    Route::get('/wr/laporan/biro', [WrController::class, 'LaporanBiro'])->name('wr.laporanBiro');
    //detail
    Route::get('/wr/laporan/prodi/{id}/detail', [WrController::class, 'detailLaporanProdi']);
    Route::get('/wr/laporan/fakultas/{id}/detail', [WrController::class, 'detailLaporanFakultas']);
    Route::get('/wr/laporan/biro/{id}/detail', [WrController::class, 'detailLaporanBiro']);

    //pengajuan
    Route::get('/wr/pengajuan/prodi', [WrController::class, 'pengajuanProdi'])->name('wr.pengajuanProdi');
    Route::get('/wr/pengajuan/fakultas', [WrController::class, 'pengajuanFakultas'])->name('wr.pengajuanFakultas');
    Route::get('/wr/pengajuan/biro', [WrController::class, 'pengajuanBiro'])->name('wr.pengajuanBiro');
    //detail
    Route::get('/wr/pengajuan/prodi/{id}/detail', [WrController::class, 'detailPengajuanProdi']);
    Route::get('/wr/pengajuan/fakultas/{id}/detail', [WrController::class, 'detailPengajuanFakultas']);
    Route::get('/wr/pengajuan/biro/{id}/detail', [WrController::class, 'detailPengajuanBiro']);
    //changestat
    Route::get('/wr/pengajuan/inventaris/validasi/{id}', [WrController::class, 'changeStatus']);

    //penghapusan
    Route::get('/wr/penghapusan/prodi', [WrController::class, 'penghapusanProdi'])->name('wr.penghapusanProdi');
    Route::get('/wr/penghapusan/fakultas', [WrController::class, 'penghapusanFakultas'])->name('wr.penghapusanFakultas');
    Route::get('/wr/penghapusan/biro', [WrController::class, 'penghapusanBiro'])->name('wr.penghapusanBiro');
    //detail
    Route::get('/wr/penghapusan/prodi/{id}/detail', [WrController::class, 'detailPenghapusanProdi']);
    Route::get('/wr/penghapusan/fakultas/{id}/detail', [WrController::class, 'detailPenghapusanFakultas']);
    Route::get('/wr/penghapusan/biro/{id}/detail', [WrController::class, 'detailPenghapusanBiro']);
    //changestat
    Route::get('/wr/penghapusan/inventaris/validasi/{id}/{jumlah_setelah}', [WrController::class, 'changeStatusPenghapusan']);

});

//inventaris
Route::group(['middleware' => ['role:inventaris']], function () {

    Route::get('/inventaris/dashboard', [InventarisController::class, 'index'])->name('inventaris.dashboard');

    //laporan
    Route::get('/inventaris/laporan/prodi', [InventarisController::class, 'laporanProdi'])->name('inventaris.laporanProdi');
    Route::get('/inventaris/laporan/fakultas', [InventarisController::class, 'LaporanFakultas'])->name('inventaris.laporanFakultas');
    Route::get('/inventaris/laporan/biro', [InventarisController::class, 'LaporanBiro'])->name('inventaris.laporanBiro');
    //detail
    Route::get('/inventaris/laporan/prodi/{id}/detail', [InventarisController::class, 'detailLaporanProdi']);
    Route::get('/inventaris/laporan/fakultas/{id}/detail', [InventarisController::class, 'detailLaporanFakultas']);
    Route::get('/inventaris/laporan/biro/{id}/detail', [InventarisController::class, 'detailLaporanBiro']);

    //penghapusan
    Route::get('/inventaris/penghapusan/prodi', [InventarisController::class, 'penghapusanProdi'])->name('inventaris.penghapusanProdi');
    Route::get('/inventaris/penghapusan/fakultas', [InventarisController::class, 'penghapusanFakultas'])->name('inventaris.penghapusanFakultas');
    Route::get('/inventaris/penghapusan/biro', [InventarisController::class, 'penghapusanBiro'])->name('inventaris.penghapusanBiro');
    //detail
    Route::get('/inventaris/penghapusan/prodi/{id}/detail', [InventarisController::class, 'detailPenghapusanProdi']);
    Route::get('/inventaris/penghapusan/fakultas/{id}/detail', [InventarisController::class, 'detailPenghapusanFakultas']);
    Route::get('/inventaris/penghapusan/biro/{id}/detail', [InventarisController::class, 'detailPenghapusanBiro']);

});

//pplp
Route::group(['middleware' => ['role:pplp']], function () {

    Route::get('/pplp/dashboard', [PplpController::class, 'index'])->name('pplp.dashboard');

    //laporan
    Route::get('/pplp/laporan/prodi', [PplpController::class, 'laporanProdi'])->name('pplp.laporanProdi');
    Route::get('/pplp/laporan/fakultas', [PplpController::class, 'LaporanFakultas'])->name('pplp.laporanFakultas');
    Route::get('/pplp/laporan/biro', [PplpController::class, 'LaporanBiro'])->name('pplp.laporanBiro');
    //detail
    Route::get('/pplp/laporan/prodi/{id}/detail', [PplpController::class, 'detailLaporanProdi']);
    Route::get('/pplp/laporan/fakultas/{id}/detail', [PplpController::class, 'detailLaporanFakultas']);
    Route::get('/pplp/laporan/biro/{id}/detail', [PplpController::class, 'detailLaporanBiro']);

    //penghapusan
    Route::get('/pplp/penghapusan/prodi', [PplpController::class, 'penghapusanProdi'])->name('pplp.penghapusanProdi');
    Route::get('/pplp/penghapusan/fakultas', [PplpController::class, 'penghapusanFakultas'])->name('pplp.penghapusanFakultas');
    Route::get('/pplp/penghapusan/biro', [PplpController::class, 'penghapusanBiro'])->name('pplp.penghapusanBiro');
    //detail
    Route::get('/pplp/penghapusan/prodi/{id}/detail', [PplpController::class, 'detailPenghapusanProdi']);
    Route::get('/pplp/penghapusan/fakultas/{id}/detail', [PplpController::class, 'detailPenghapusanFakultas']);
    Route::get('/pplp/penghapusan/biro/{id}/detail', [PplpController::class, 'detailPenghapusanBiro']);

});


