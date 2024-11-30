<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuKategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk menampilkan daftar pengguna
Route::get('/users', function () {
    $users = User::all(); // Mengambil semua data dari tabel users
    return view('layouts.index', compact('users')); // Mengirim data ke view
});

// Group middleware untuk autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Group middleware untuk peran admin dan petugas
Route::middleware(['Role:admin,petugas'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

// Route untuk BukuKategori
Route::get('/buku_kategori', [BukuKategoriController::class, 'index'])->name('buku_kategori.index');
Route::get('/buku_kategori/create', [BukuKategoriController::class, 'create'])->name('buku_kategori.create');
Route::post('/buku_kategori/store', [BukuKategoriController::class, 'store'])->name('buku_kategori.store');
Route::get('/buku_kategori/edit/{id}', [BukuKategoriController::class, 'edit'])->name('buku_kategori.edit');
Route::put('/buku_kategori/update/{id}', [BukuKategoriController::class, 'update'])->name('buku_kategori.update');
Route::delete('/buku_kategori/{id}', [BukuKategoriController::class, 'destroy'])->name('buku_kategori.destroy');

//route untuk buku controller
Route::get('buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('buku/store', [BukuController::class, 'store'])->name('buku.store');
Route::get('buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

// Route untuk Peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('/peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('/peminjaman/update/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

// Mengimpor routes untuk otentikasi
require __DIR__.'/auth.php';
