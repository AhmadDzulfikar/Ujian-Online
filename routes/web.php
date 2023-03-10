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

    Route::controller(App\Http\Controllers\Admin\SiswaController::class)
        ->prefix('siswa')
        ->group(function () {
            Route::get('/', 'index')->name('admin.siswa');
            Route::post('/store', 'store')->name('admin.store.siswa');
            Route::put('/update/{id}', 'update')->name('admin.update.siswa');
            Route::delete('/delete/{id}', 'destroy')->name('admin.delete.siswa');
        });

    Route::controller(App\Http\Controllers\Admin\MapelController::class)
        ->prefix('mapel')
        ->group(function () {
            Route::get('/', 'index')->name('admin.mapel');
            Route::post('/store', 'store')->name('admin.store.mapel');
            Route::put('/update/{id}', 'update')->name('admin.update.mapel');
            Route::delete('/delete/{id}', 'destroy')->name('admin.delete.mapel');
        });

    Route::controller(App\Http\Controllers\Admin\KelasController::class)
        ->prefix('kelas')
        ->group(function () {
            Route::get('/', 'index')->name('admin.kelas');
            Route::post('/store', 'store')->name('admin.store.kelas');
            Route::put('/update/{id}', 'update')->name('admin.update.kelas');
            Route::delete('/delete/{id}', 'destroy')->name('admin.delete.kelas');
        });

    Route::controller(App\Http\Controllers\Admin\UjianController::class)
        ->prefix('ujian')
        ->group(function () {
            Route::get('/', 'index')->name('admin.ujian');
            Route::post('/store', 'store')->name('admin.store.ujian');
            Route::put('/update/{id}', 'update')->name('admin.update.ujian');
            Route::delete('/delete/{id}', 'destroy')->name('admin.delete.ujian');
        });
    Route::controller(App\Http\Controllers\Admin\GenerateTokenController::class)
        ->prefix('generate-token')
        ->group(function () {
            Route::get('/', 'index')->name('admin.generate-token');
            Route::post('/store', 'generate_token_ujian')->name('admin.generate-token-ujian');
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

Route::middleware(['auth:siswa'])->prefix('siswa')->group(function () {
    Route::controller(App\Http\Controllers\Siswa\UjianController::class)
        ->group(function () {
            Route::get('/konfirmasi-ujian', 'index')->name('siswa.konfirmasi-ujian');
            Route::get('/soal-ujian/{ujian}/{enkripsi}', 'soal_ujian')->name('siswa.soal-ujian');
            Route::post('/submit-token', 'submit_token')->name('siswa.submit-token');
        });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
