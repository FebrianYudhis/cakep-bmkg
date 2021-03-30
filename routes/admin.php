<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['kunciadmin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});
