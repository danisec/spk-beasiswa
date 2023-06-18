<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\RegisterController;
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

Route::controller(HomeController::class)->name('home.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(KriteriaController::class)->name('kriteria.')->middleware('auth')->group(function () {
    Route::get('/kriteria', 'index')->name('index');
    
    Route::get('/kriteria/tambah-kriteria', 'create')->name('create');
    Route::post('/kriteria/tambah-kriteria', 'store')->name('store');
    
    Route::get('/kriteria/{id}/edit', 'edit')->name('edit');
    Route::put('/kriteria/{id}', 'update')->name('update');

    Route::get('/kriteria/view-kriteria/{id}/view', 'show')->name('show');

    Route::delete('/kriteria/{id}', 'destroy')->name('destroy');
});

Route::controller(AlternatifController::class)->name('alternatif.')->middleware('auth')->group(function () {
    Route::get('/alternatif', 'index')->name('index');
    
    Route::get('/alternatif/tambah-alternatif', 'create')->name('create');
    Route::post('/alternatif/tambah-alternatif', 'store')->name('store');
    
    Route::get('/alternatif/{id}/edit', 'edit')->name('edit');
    Route::put('/alternatif/{id}', 'update')->name('update');

    Route::get('/alternatif/view-alternatif/{id}/view', 'show')->name('show');

    Route::delete('/alternatif/{id}', 'destroy')->name('destroy');
});

Route::controller(CripsController::class)->name('crips.')->middleware('auth')->group(function () {
    Route::get('/crips', 'index')->name('index');
    
    Route::get('/crips/tambah-crips', 'create')->name('create');
    Route::post('/crips/tambah-crips', 'store')->name('store');
    
    Route::get('/crips/{id}/edit', 'edit')->name('edit');
    Route::put('/crips/{id}', 'update')->name('update');

    Route::get('/crips/view-crips/{id}/view', 'show')->name('show');

    Route::delete('/crips/{id}', 'destroy')->name('destroy');
});

Route::controller(PenilaianController::class)->name('penilaian.')->middleware('auth')->group(function () {
    Route::get('/penilaian', 'index')->name('index');
    
    Route::get('/penilaian/tambah-penilaian', 'create')->name('create');
    Route::post('/penilaian/tambah-penilaian', 'store')->name('store');
    
    Route::get('/penilaian/{id}/edit', 'edit')->name('edit');
    Route::put('/penilaian/{id}', 'update')->name('update');

    Route::get('/penilaian/view-penilaian/{id}/view', 'show')->name('show');

    Route::delete('/penilaian/{id}', 'destroy')->name('destroy');
});

Route::controller(PerhitunganController::class)->name('perhitungan.')->middleware('auth')->group(function () {
    Route::get('/perhitungan', 'index')->name('index');
    
    Route::get('/perhitungan/tambah-perhitungan', 'create')->name('create');
    Route::post('/perhitungan/tambah-perhitungan', 'store')->name('store');
    
    Route::get('/perhitungan/{id}/edit', 'edit')->name('edit');
    Route::put('/perhitungan/{id}', 'update')->name('update');

    Route::get('/perhitungan/view-perhitungan/{id}/view', 'show')->name('show');

    Route::delete('/perhitungan/{id}', 'destroy')->name('destroy');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('login.authenticate')->middleware('guest');
    Route::post('/logout', 'logout')->name('login.logout')->middleware('auth');
});

Route::controller(RegisterController::class)->name('register.')->middleware('guest')->group(function () {
    Route::get('/register', 'index')->name('index');
    Route::post('/register', 'store')->name('store');
});
