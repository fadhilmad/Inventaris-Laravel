<?php

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

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name('login');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'showLogout']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

});

