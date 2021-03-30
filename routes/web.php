<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'masukuser']);

Route::get('/masuk', [AuthController::class, 'masukuser'])->name('user.masuk');
Route::post('/masuk', [AuthController::class, 'masukuserpost']);
Route::get('/daftar', [AuthController::class, 'daftaruser'])->name('user.daftar');
Route::post('/daftar', [AuthController::class, 'daftaruserpost']);

Route::get('/kelola', [AuthController::class, 'masukadmin'])->name('admin.masuk');
Route::post('/kelola', [AuthController::class, 'masukadminpost']);
