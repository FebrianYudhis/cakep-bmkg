<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/app/terkunci', [AppController::class, 'terkunci'])->middleware('kunciapp')->name('user.terkunci');

Route::prefix('app')->middleware(['kunciapp', 'cekakun'])->group(function () {
    Route::get('/', [AppController::class, 'index'])->name('user.dashboard');
});
