<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModelingController;
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

Route::controller(BeasiswaController::class)->name('beasiswa.')->middleware('auth')->group(function () {
    Route::get('/data-beasiswa', 'index')->name('index');
    Route::post('/data-beasiswa', 'store')->name('store');
    Route::delete('/data-beasiswa/{id}', 'destroy')->name('destroy');

    Route::get('/data-beasiswa/{id}/edit', 'edit')->name('edit');
    Route::put('/data-beasiswa/{id}', 'update')->name('update');
});

Route::controller(MahasiswaController::class)->name('mahasiswa.')->middleware('auth')->group(function () {
    Route::get('/daftar-beasiswa', 'index')->name('index');
    Route::get('/daftar-beasiswa/create-mahasiswa', 'create')->name('create');

    Route::post('/daftar-beasiswa', 'store')->name('store');
    Route::delete('/daftar-beasiswa/{id}', 'destroy')->name('destroy');

    Route::get('/daftar-beasiswa/{id}/edit', 'edit')->name('edit');
    Route::put('/daftar-beasiswa/{id}', 'update')->name('update');
});

Route::controller(KriteriaController::class)->name('kriteria.')->middleware('auth')->group(function () {
    Route::get('/data-kriteria', 'index')->name('index');
    Route::post('/data-kriteria', 'store')->name('store');
    Route::delete('/data-kriteria/{id}', 'destroy')->name('destroy');

    Route::get('/data-kriteria/{id}/edit', 'edit')->name('edit');
    Route::put('/data-kriteria/{id}', 'update')->name('update');
});

Route::controller(ModelingController::class)->name('model.')->middleware('auth')->group(function () {
    Route::get('/data-model', 'index')->name('index');
    Route::post('/data-model', 'store')->name('store');
    Route::delete('/data-model/{id}', 'destroy')->name('destroy');

    Route::get('/data-model/{id}/edit', 'edit')->name('edit');
    Route::put('/data-model/{id}', 'update')->name('update');
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
