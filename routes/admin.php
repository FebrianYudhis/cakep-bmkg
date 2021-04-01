<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['kunciadmin'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/ganti-password', [AdminController::class, 'gantipassword'])->name('gantipassword');
    Route::post('/ganti-password', [AdminController::class, 'gantipasswordpost']);

    Route::get('/akun', [AdminController::class, 'akun'])->name('akun');

    Route::name('akun.')->group(function () {
        Route::get('/akun/{user:username}/aktifkan', [AdminController::class, 'aktifkanakun'])->name('aktifkan');
        Route::get('/akun/{user:username}/matikan', [AdminController::class, 'matikanakun'])->name('matikan');
        Route::get('/akun/{user:username}/hapus', [AdminController::class, 'hapusakun'])->name('hapus');
    });
});
