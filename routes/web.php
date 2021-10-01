<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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
    Route::get('/admin/rekap/laporan/fakultas', [AdminController::class, 'dataUser'])->name('admin.rekapLaporanFakultas');
    Route::get('/admin/rekap/laporan/biro', [AdminController::class, 'dataUser'])->name('admin.rekapLaporanBiro');

    //rekap pengajuan
    Route::get('/admin/rekap/pengajuan/prodi', [AdminController::class, 'dataUser'])->name('admin.rekapPengajuanProdi');
    Route::get('/admin/rekap/pengajuan/fakultas', [AdminController::class, 'dataUser'])->name('admin.rekapPengajuanFakultas');
    Route::get('/admin/rekap/pengajuan/biro', [AdminController::class, 'dataUser'])->name('admin.rekapPengajuanBiro');

    //rekap penghapusan
    Route::get('/admin/rekap/penghapusan/prodi', [AdminController::class, 'dataUser'])->name('admin.rekapPenghapusanProdi');
    Route::get('/admin/rekap/penghapusan/fakultas', [AdminController::class, 'dataUser'])->name('admin.rekapPenghapusanFakultas');
    Route::get('/admin/rekap/penghapusan/biro', [AdminController::class, 'dataUser'])->name('admin.rekapPenghapusanBiro');

});

//tu
Route::group(['middleware' => ['role:tu']], function () {

    Route::get('/tu/dashboard', [AdminController::class, 'index'])->name('tu.dashboard');

});

//ketua
Route::group(['middleware' => ['role:ketua']], function () {

    Route::get('/ketua/dashboard', [AdminController::class, 'index'])->name('ketua.dashboard');

});

//wr
Route::group(['middleware' => ['role:wr']], function () {

    Route::get('/wr/dashboard', [AdminController::class, 'index'])->name('wr.dashboard');

});

//inventaris
Route::group(['middleware' => ['role:inventaris']], function () {

    Route::get('/inventaris/dashboard', [AdminController::class, 'index'])->name('inventaris.dashboard');

});

//pplp
Route::group(['middleware' => ['role:pplp']], function () {

    Route::get('/pplp/dashboard', [AdminController::class, 'index'])->name('pplp.dashboard');

});


