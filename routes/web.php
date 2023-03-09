<?php

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

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/', [HomeController::class, 'index']);

Route::get('login-siswa', function () {
    return view('auth.siswa');
})->name('siswa.login-siswa');
Route::post('post-login-siswa', [App\Http\Controllers\Auth\LoginController::class, 'login_siswa'])->name('post.login-siswa');

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::controller(App\Http\Controllers\Admin\GuruController::class)
        ->prefix('guru')
        ->group(function () {
            Route::get('/', 'index')->name('admin.guru');
            Route::post('/store', 'store')->name('admin.store.guru');
            Route::put('/update/{id}', 'update')->name('admin.update.guru');
            Route::delete('/delete/{id}', 'destroy')->name('admin.delete.guru');
        });

    Route::controller(App\Http\Controllers\Admin\MapelController::class)
        ->prefix('mapel')
        ->group(function () {
            Route::get('/', 'index')->name('admin.mapel');
            Route::post('/store', 'store')->name('admin.store.mapel');
            Route::put('/update/{id}', 'update')->name('admin.update.mapel');
            Route::delete('/delete/{id}', 'destroy')->name('admin.delete.mapel');
        });
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
