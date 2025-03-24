<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevisiController;
use App\Http\Controllers\IzinKaryawanController;
use App\Http\Controllers\JenisIzinController;
use App\Http\Controllers\JenisPegawaiController;
use App\Http\Controllers\KendaraanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('devisi', DevisiController::class);
Route::put('devisi/{devisi}', [DevisiController::class, 'update']);
Route::resource('izinkaryawan', IzinKaryawanController::class);
Route::resource('jenisizin', JenisIzinController::class);
Route::resource('jenispegawai', JenisPegawaiController::class);
Route::resource('kendaraan', KendaraanController::class);
