<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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
Route::post('login', [LoginController::class,'proses_login'])->name('proses_login');
Route::get('logout', [LoginController::class,'logout'])->name('logout');


// admin
Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
    Route::get('/akun', [AdminController::class, 'akun'])->name('akun');
    Route::get('/datapegawai', [AdminController::class, 'datapegawai'])->name('data_pegawai');
    Route::post('/tambah', [AdminController::class, 'tambahpegawai'])->name('tambah_pegawai');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/kehadiran', [AdminController::class, 'kehadiran'])->name('kehadiran');
    Route::get('/libur', [AdminController::class, 'libur'])->name('libur');
    Route::post('/libur', [AdminController::class, 'simpan_libur'])->name('simpan_libur');
    Route::delete('/libur/{id}', [AdminController::class, 'delete_libur'])->name('delete_libur');
    Route::post('/settingabsen', [AdminController::class, 'settingabsen'])->name('setting.absen');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
    Route::post('/terimaizin', [AdminController::class, 'terimaizin'])->name('terimaizin');

});

// user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/dataabsen', [UserController::class, 'data_absen'])->name('data_absen');
    Route::post('/masuk', [UserController::class, 'masuk'])->name('masuk');
    Route::post('/keluar', [UserController::class, 'keluar'])->name('keluar');
    Route::post('/izin', [UserController::class, 'izin'])->name('izin');
});




Route::get('/welcome', function () {
    return view('welcome');
});


