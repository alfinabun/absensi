<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'proses_login'])->name('proses_login');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class,'index'])->name('dashboard');
    Route::get('/setting', [AdminController::class,'setting'])->name('setting');
    Route::get('/data', [AdminController::class,'data'])->name('data');
    Route::get('/datapegawai', [AdminController::class,'datapegawai'])->name('data_pegawai');
    Route::get('/kehadiran', [AdminController::class,'kehadiran'])->name('kehadiran');
    Route::get('/libur', [AdminController::class,'libur'])->name('libur');
});


Route::get('/welcome', function () {
    return view('welcome');
});


