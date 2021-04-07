<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['kunciadmin'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/ganti-password', [AdminController::class, 'gantipassword'])->name('gantipassword');
    Route::post('/ganti-password', [AdminController::class, 'gantipasswordpost']);

    Route::get('/akun', [AdminController::class, 'akun'])->name('akun');

    Route::name('akun.')->group(function () {
        Route::patch('/akun/{user:username}/aktifkan', [AdminController::class, 'aktifkanakun'])->name('aktifkan');
        Route::patch('/akun/{user:username}/matikan', [AdminController::class, 'matikanakun'])->name('matikan');
        Route::delete('/akun/{user:username}/hapus', [AdminController::class, 'hapusakun'])->name('hapus');
    });

    Route::get('/absen', [AdminController::class, 'absen'])->name('absen');
    Route::get('/absen/{absent}/edit', [AdminController::class, 'editabsen'])->name('absen.edit');
    Route::put('/absen/{absent}/edit', [AdminController::class, 'updateabsen']);
});
