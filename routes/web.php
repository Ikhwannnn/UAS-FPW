<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index'); // Menampilkan daftar mahasiswa
    Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create'); // Menampilkan form tambah mahasiswa
    Route::post('/', [MahasiswaController::class, 'store'])->name('mahasiswa.store'); // Menyimpan mahasiswa baru
    Route::get('/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show'); // Menampilkan detail mahasiswa
    Route::get('/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit'); // Menampilkan form edit mahasiswa
    Route::put('/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update'); // Mengupdate data mahasiswa
    Route::delete('/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa-delete'); // Menghapus mahasiswa
});

require __DIR__.'/auth.php';
