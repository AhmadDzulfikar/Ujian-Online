<?php

use App\Http\Controllers\Auth\LoginController;
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
    return view('layouts.master');
});

Route::get('login-siswa', function () {
    return view('auth.login-siswa');
})->name('siswa.login-siswa');
Route::post('post-login-siswa', [LoginController::class, 'login_siswa'])->name('post.login-siswa');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth:proktor'])->group(function () {
    Route::get('/proktor/dashboard', function () {
        return view('proktor.dashboard');
    })->name('proktor.dashboard');
});

Route::middleware(['auth:guru'])->group(function () {
    Route::get('/guru/dashboard', function () {
        return view('guru.dashboard');
    })->name('guru.dashboard');
});

Route::middleware(['auth:siswa'])->group(function () {
    Route::get('/siswa/konfirmasi-ujian', function () {
        return view('siswa.konfirmasi-ujian');
    })->name('siswa.konfirmasi-ujian');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
