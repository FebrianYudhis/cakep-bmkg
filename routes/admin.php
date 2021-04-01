<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['kunciadmin'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/ganti-password', [AdminController::class, 'gantipassword'])->name('gantipassword');
    Route::post('/ganti-password', [AdminController::class, 'gantipasswordpost']);
});
