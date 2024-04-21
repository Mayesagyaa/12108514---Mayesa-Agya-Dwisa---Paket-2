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
            <!-- Daftar Produk -->
            <div class="container">
                <div class="row">
                    @foreach($produk as $produk)
    <div class="col-md-4 mb-3">
        <div class="card shadow">
            <div class="card-body d-flex align-items-center justify-content-center">
                <img class="card-img-top" src="{{$produk->gambar}}" style="width: 200px; height: 200px; object-fit: cover;">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                <p class="card-text">Stok: {{ $produk->stok }}</p>
                <p class="card-text">Harga: {{ 'Rp '.number_format($produk->harga, 0, ',', '.') }}</p>
                <form action="{{ route('tambah.jumlah', $produk->id) }}" method="POST">
                    @csrf
                    <label for="jumlah_{{ $produk->id }}">Jumlah:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-plus"></i></button>
                        </div>
                        <input type="number" id="jumlah_{{ $produk->id }}" name="jumlah" value="1" min="1" class="form-control">
                    </div>
                </form>
                <form action="{{ route('kurang.jumlah', $produk->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-minus"></i></button>
                </form>
            </div>
        </div>
    </div>
@endforeach

{{--  --}}
                </div>
            </div>
            <!-- End of Daftar Produk -->

            <!-- Form Pelanggan -->
            <form action="" method="POST">
                @csrf
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
            <!-- End of Form Pelanggan -->
        </div>
    </div>
</div>
<!-- End of Tab Tambah Penjualan -->

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
                        <form action="" method="POST">
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
</section>
@endsection 
