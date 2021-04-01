<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/app/terkunci', [AppController::class, 'terkunci'])->middleware('kunciapp')->name('user.terkunci');

Route::prefix('app')->middleware(['kunciapp', 'cekakun'])->name('user.')->group(function () {
    Route::get('/', [AppController::class, 'index'])->name('dashboard');

    Route::get('/ganti-password', [AppController::class, 'gantipassword'])->name('gantipassword');
    Route::post('/ganti-password', [AppController::class, 'gantipasswordpost']);

    Route::name('absen.')->group(function () {
        Route::get('/absen-datang', [AppController::class, 'absendatang'])->name('datang');
        Route::put('/absen-datang', [AppController::class, 'catatabsendatang']);

        Route::get('/absen-pulang', [AppController::class, 'absenpulang'])->name('pulang');
    });
});
