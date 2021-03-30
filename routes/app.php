<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::prefix('app')->middleware(['kunciapp'])->group(function () {
    Route::get('/', [AppController::class, 'index'])->name('user.dashboard');
});
