@extends('petugas.index')

@section('title', 'Penjualan')

@section('content.index')
    <div class="container">
        <h1>Penjualan</h1>

        <!-- Tab menu -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tambah-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="tambah" aria-selected="true">Tambah Penjualan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="konfirmasi-tab" data-toggle="tab" href="#konfirmasi" role="tab" aria-controls="konfirmasi" aria-selected="false">Konfirmasi Penjualan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pesan-tab" data-toggle="tab" href="#pesan" role="tab" aria-controls="pesan" aria-selected="false">Pesan Penjualan</a>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content" id="myTabContent">
            <!-- Tab Tambah Penjualan -->
            <div class="tab-pane fade show active" id="tambah" role="tabpanel" aria-labelledby="tambah-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="" method="">
                            @csrf
                            <!-- Daftar Produk -->
                           
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text">Stok:</p>
                                        <p class="card-text">Harga:</p>
                                        <input type="hidden" name="produk_id[]" value="">
                                        <label for="jumlah_">Jumlah:</label>
                                        <input type="number" id="jumlah_" name="jumlah[]" value="1" min="1">
                                    </div>
                                </div>
                          
                            <!-- Form Pelanggan -->
                            <div class="form-group mt-3">
                                <label for="nama_pelanggan">Nama Pelanggan:</label>
                                <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat_pelanggan">Alamat Pelanggan:</label>
                                <textarea id="alamat_pelanggan" name="alamat_pelanggan" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon:</label>
                                <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab Konfirmasi Penjualan -->
            <div class="tab-pane fade" id="konfirmasi" role="tabpanel" aria-labelledby="konfirmasi-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <!-- Tampilkan ringkasan penjualan yang telah dipilih -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Detail penjualan -->
                            </div>
                        </div>
                        <!-- Form untuk mengisi informasi pelanggan -->
                        <form action="" method="">
                            @csrf
                            <!-- Form untuk informasi pelanggan -->
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab Pesan Penjualan -->
            <div class="tab-pane fade" id="pesan" role="tabpanel" aria-labelledby="pesan-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <!-- Form untuk mengisi informasi pelanggan -->
                        <form action="" method="POST">
                            @csrf
                            <!-- Form untuk informasi pelanggan -->
                            <div class="form-group mt-3">
                                <label for="nama_pelanggan_pesan">Nama Pelanggan:</label>
                                <input type="text" id="nama_pelanggan_pesan" name="nama_pelanggan_pesan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat_pelanggan_pesan">Alamat Pelanggan:</label>
                                <textarea id="alamat_pelanggan_pesan" name="alamat_pelanggan_pesan" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon_pesan">Nomor Telepon:</label>
                                <input type="text" id="nomor_telepon_pesan" name="nomor_telepon_pesan" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection











































































































































































































































































































































































{{-- @extends('petugas.index')

@section('title', 'Penjualan')

@section('content.index')
    <div class="container">
        <h1>Penjualan</h1>

        <!-- Tab menu -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tambah-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="tambah" aria-selected="true">Tambah Penjualan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="konfirmasi-tab" data-toggle="tab" href="#konfirmasi" role="tab" aria-controls="konfirmasi" aria-selected="false">Konfirmasi Penjualan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pesan-tab" data-toggle="tab" href="#pesan" role="tab" aria-controls="pesan" aria-selected="false">Pesan Penjualan</a>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content" id="myTabContent">
            <!-- Tab Tambah Penjualan -->
            <div class="tab-pane fade show active" id="tambah" role="tabpanel" aria-labelledby="tambah-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ route('petugas.simpan_penjualan') }}" method="POST">
                            @csrf
                            <!-- Daftar Produk -->
                            @foreach($produks as $produk)
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                        <p class="card-text">Stok: {{ $produk->stok }}</p>
                                        <p class="card-text">Harga: {{ $produk->harga }}</p>
                                        <input type="hidden" name="produk_id[]" value="{{ $produk->id }}">
                                        <label for="jumlah_{{ $produk->id }}">Jumlah:</label>
                                        <input type="number" id="jumlah_{{ $produk->id }}" name="jumlah[]" value="1" min="1">
                                    </div>
                                </div>
                            @endforeach
                            <!-- Form Pelanggan -->
                            <div class="form-group mt-3">
                                <label for="nama_pelanggan">Nama Pelanggan:</label>
                                <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat_pelanggan">Alamat Pelanggan:</label>
                                <textarea id="alamat_pelanggan" name="alamat_pelanggan" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon:</label>
                                <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab Konfirmasi Penjualan -->
            <div class="tab-pane fade" id="konfirmasi" role="tabpanel" aria-labelledby="konfirmasi-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <!-- Tampilkan ringkasan penjualan yang telah dipilih -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Detail penjualan -->
                            </div>
                        </div>
                        <!-- Form untuk mengisi informasi pelanggan -->
                        <form action="{{ route('petugas.pesan_penjualan') }}" method="POST">
                            @csrf
                            <!-- Form untuk informasi pelanggan -->
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab Pesan Penjualan -->
            <div class="tab-pane fade" id="pesan" role="tabpanel" aria-labelledby="pesan-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <!-- Form untuk mengisi informasi pelanggan -->
                        <form action="{{ route('petugas.pesan_penjualan') }}" method="POST">
                            @csrf
                            <!-- Form untuk informasi pelanggan -->
                            <div class="form-group mt-3">
                                <label for="nama_pelanggan_pesan">Nama Pelanggan:</label>
                                <input type="text" id="nama_pelanggan_pesan" name="nama_pelanggan_pesan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat_pelanggan_pesan">Alamat Pelanggan:</label>
                                <textarea id="alamat_pelanggan_pesan" name="alamat_pelanggan_pesan" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon_pesan">Nomor Telepon:</label>
                                <input type="text" id="nomor_telepon_pesan" name="nomor_telepon_pesan" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 --}}