@extends('layouts.index')

@section('title', '| Data Pembelian')

@section('content.index')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Penjualan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Meja</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <a href="" class="btn btn-secondary mb-3">Export ke Excel</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Total Harga</th>
                                    <th>Dibuat Oleh</th>
                                    <th style="width: 140px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualans as $penjual)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $penjual->pelanggan->nama_pelanggan }}</td>
                                    <td>{{ $penjual->created_at->format('d-M-Y') }}</td>
                                    <td>{{ $penjual->total_harga }}</td>
                                    <td>{{ $penjual->user->name }}</td>
                                    <td class="row">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#exampleModal{{ $penjual->id }}"><i
                                                class="fas fa-eye"></i></button>
                                        <a href="#" class="btn btn-primary"><i class="fas fa-download"></i></a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach ($penjualans as $penjual)
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal{{ $penjual->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Sale {{ $penjual->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>Nama Pelanggan: {{ $penjual->pelanggan->nama_pelanggan }}</div>
                <div>Alamat Pelanggan: {{ $penjual->pelanggan->alamat }}</div>
                <div>Nomor Pelanggan : {{ $penjual->pelanggan->no_telp }}</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Banyak Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjual->detailPenjualans as $item)
                        <tr>
                            <td>{{ $item->produk->nama_produk }}</td>
                            <td>{{ $item->jumlah_produk }}</td>
                            <td>Rp{{ number_format($item->produk->harga, 0, ',' . '.') }}</td>
                            <td>Rp{{ number_format($item->subtotal, 0, ',' . '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>Total Harga: Rp{{ number_format($penjual->total_harga, 0, ',' . '.') }}</div>
            </div>

        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Close
            </button>
        </div>
    </div>
</div>
@endforeach

@endsection
