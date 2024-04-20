<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Tempat untuk mengatur semua rute aplikasi kamu. Semua rute ini diatur
| dengan middleware 'web' yang membantu menjaga akses sesuai kebutuhan.
|
*/

// Rute untuk pengguna yang belum login
Route::middleware(['guest'])->group(function (){
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login'])->name('input.login');
});

// Rute pengalihan ke admin ketika mengakses /home
Route::get('/home', function(){
    return redirect('/admin');
});

// Halaman pembelian untuk admin
Route::get('/pembelian', function(){
    return view('admin.pembelian.index');
});

// Rute untuk pengguna yang sudah login
Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/petugas', [PetugasController::class, 'index'])->middleware('userAkses:petugas');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

// Rute khusus admin
Route::group(['middleware' => ['userAkses:admin', 'auth']], function () {
    Route::get('/dashboard_admin', [AdminController::class, 'index'])->name('dashboard_admin');
    
    // Pengelolaan produk
    Route::controller(ProdukController::class)->prefix('produk')->group(function () {
        Route::get('', 'index')->name('produk');
        Route::get('tambah', 'tambah')->name('formproduk');
        Route::post('tambah/produk', 'simpan')->name('produk.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('produk.edit');
        Route::patch('edit/{id}', 'update')->name('produk.edit.update');
        Route::get('hapus/{id}', 'hapus')->name('produk.hapus');
        Route::put('update-product/{id}', 'updateStok')->name('produk.updateStok');
    });

 




