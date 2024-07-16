<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SpesialisasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('/', LandingController::class);
Route::resource('users', UserController::class);
Route::resource('pasien', PasienController::class);
Route::resource('spesialisasi', SpesialisasiController::class);
Route::resource('dokter', DokterController::class);
Route::resource('jadwal', JadwalController::class);

Route::get('login', [LoginController::class, 'index']);
Route::post('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('reset-password', [LoginController::class, 'resetPassword']);

Route::middleware('auth:api')->group(function () {
    // Protected routes
    Route::get('user', function () {
        return response()->json(auth()->user());
    });

    Route::post('refresh', [LoginController::class, 'refresh']);
    Route::post('logout', [LoginController::class, 'logout']);
});
