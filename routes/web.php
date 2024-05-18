<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daftarjurusan', [JurusanController::class, 'index'])->name('daftarjurusan');
Route::get('/daftarjurusan/create', [JurusanController::class, 'create'])->name('daftarjurusan.create');
Route::post('/daftarjurusan/create', [JurusanController::class, 'store'])->name('daftarjurusan.store');
Route::get('/daftarjurusan/edit/{id}', [JurusanController::class, 'edit'])->name('daftarjurusan.edit');
Route::put('/daftarjurusan/edit/{id}', [JurusanController::class, 'update'])->name('daftarjurusan.update');
Route::delete('/daftarjurusan/{id}', [JurusanController::class, 'destroy'])->name("daftarjurusan.destroy");

Route::resource('pendaftaran', PendaftaranController::class);
