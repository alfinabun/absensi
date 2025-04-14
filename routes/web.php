<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [loginController::class,'index'])->name('login');
Route::post('/login', [loginController::class,'login'])->name('proses_login');
Route::get('/admin', [AdminController::class,'index'])->name('dashboard');
Route::get('/setting', [AdminController::class,'setting'])->name('setting');
Route::get('/data', [AdminController::class,'data'])->name('data');
Route::get('/datapegawai', [AdminController::class,'datapegawai'])->name('data_pegawai');
Route::get('/kehadiran', [AdminController::class,'kehadiran'])->name('kehadiran');


Route::get('/welcome', function () {
    return view('welcome');
});


