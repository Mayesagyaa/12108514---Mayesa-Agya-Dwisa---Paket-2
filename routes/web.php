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

    // Pengelolaan penjualan
    Route::prefix('pembelian')->group(function() {
        Route::get('/', [AdminController::class, 'pembelian'])->name('pembelian');
    });

    // Pengelolaan pengguna admin
    Route::get('/user', [AdminController::class, 'user'])->name('user');
    Route::get('/tambahUser', [AdminController::class, 'tambah'])->name('tambahUser');
    Route::post('/kirim-data', [AdminController::class, 'tambahUser'])->name('kirim-data');
    Route::get('/editUsers/{id}', [AdminController::class, 'editUsers'])->name('editUsers');     
    Route::patch('/updateUser/{id}', [AdminController::class, 'updateUser'])->name('updateUser'); 
    Route::get('/delete/{id}',  [AdminController::class, 'destroy'])->name('delete');
});

// Rute khusus untuk petugas
Route::group(['middleware' => ['userAkses:petugas', 'auth']], function () {
    Route::get('/dashboard_petugas', [PetugasController::class, 'index'])->name('dashboard_petugas');
    Route::get('/produk-petugas', [ProdukController::class, 'indexPetugas'])->name('produk_petugas');
    
  // Rute untuk halaman tambah penjualan// Rute untuk halaman tambah penjualan
  Route::get('/tambah', [PetugasController::class, 'tambahPenjualan'])->name('penjualan_create');

    // Rute untuk menyimpan data penjualan baru
    Route::post('/penjualan/simpan', [PenjualanController::class, 'simpan'])->name('simpan_item');
    
    Route::get('/penjualan/detail/{id}', [PenjualanController::class, 'detail'])->name('detail_penjualan');
    Route::post('/penjualan/hapus/{id}', [PenjualanController::class, 'hapus'])->name('hapus_penjualan');


    

    // Menampilkan halaman penjualan
    Route::get('/penjualan', [PetugasController::class, 'tampilkanPenjualan'])->name('petugas.pesan_item');
    
    // Halaman checkout
    Route::get('/penjualan/tambah/checkout', [PenjualanController::class, 'transaction'])->name('petugas.checkout');
   
    // Halaman checkout
    Route::post('/penjualan/tambah/checkout/store', [PenjualanController::class, 'transactionStore'])->name('petugas.checkout.store');
    
    // Menyimpan penjualan
    Route::post('/simpan-penjualan', [PetugasController::class, 'simpanPenjualan'])->name('petugas.simpan_item');

    // Route untuk menambah jumlah barang
    Route::post('/tambah-jumlah/{id}', [PenjualanController::class, 'tambahJumlah'])->name('tambah.jumlah');

    // Route untuk mengurangi jumlah barang
    Route::post('/kurang-jumlah/{id}', [PenjualanController::class, 'kurangJumlah'])->name('kurang.jumlah');

    Route::post('/produk/update/{id}', [PenjualanController::class, 'updateJumlah'])->name('update.jumlah');

    Route::get('penjualan/{id}/download-pdf', [PenjualanController::class, 'downloadPDF'])->name('penjualan.download.pdf');


});




