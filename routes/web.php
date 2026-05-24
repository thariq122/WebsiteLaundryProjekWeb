<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaundryController;

// Halaman Depan Utama
Route::get('/', function () { return view('halaman_depan'); });

// Jalur Cek Status Pelanggan
Route::get('/status', [LaundryController::class, 'cekStatus']);

// Fitur Login Area Kasir
Route::get('/login', [LaundryController::class, 'halamanLogin'])->name('login');
Route::post('/login', [LaundryController::class, 'prosesLogin']);
Route::get('/logout', [LaundryController::class, 'logout']);

// Dashboard Kasir & Aksi Kelola
Route::get('/admin/dashboard', [LaundryController::class, 'dashboardAdmin']);
Route::post('/admin/update-status/{id}', [LaundryController::class, 'updateStatus']);
Route::get('/admin/hapus/{id}', [LaundryController::class, 'hapusPesanan']);

// --- TAMBAHAN BARU: SIMPAN PESANAN ---
Route::post('/admin/tambah-pesanan', [LaundryController::class, 'simpanPesanan']);

// --- TAMBAHAN BARU: CETAK NOTA ---
Route::get('/admin/cetak/{id}', [LaundryController::class, 'cetakNota']);

// --- FITUR PELANGGAN: CEK STATUS NOTA ---
Route::get('/status', [LaundryController::class, 'cekStatus']);

// --- TAMBAHAN BARU: CETAK REKAP LAPORAN ---
Route::get('/admin/laporan', [LaundryController::class, 'cetakLaporan']);