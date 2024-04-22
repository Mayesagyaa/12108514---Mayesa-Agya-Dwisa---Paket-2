@extends('petugas.index')

@section('title', '| Data Pembelian')

@section('content.index')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pembelian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_petugas') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Pembelian</li>
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
                        <a href="{{ route('penjualan_create')}}" class="btn btn-primary mb-3">Tambah Pembelian</a>
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
                                @foreach ($penjualan as $penjualans)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $penjualans->pelanggan->nama_pelanggan }}</td>
                                    <td>{{ $penjualans->created_at->format('d-M-Y') }}</td>
                                    <td>{{ $penjualans->total_harga }}</td>
                                    <td>{{ $penjualans->user->name }}</td>
                                    <td class="row">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{ $penjualans->id }}"><i class="fas fa-eye"></i></button>
                                        <a href="{{ route('penjualan.download.pdf', ['id' => $penjualans->id]) }}" class="btn btn-secondary mb-3">Download Detail Pembelian (PDF)</a>
                                        <form method="POST" action="{{ route('hapus_penjualan', ['id' => $penjualans->id]) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus penjualan ini?');">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
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

<!-- Modal for showing sale details -->
@foreach ($penjualan as $penjualans)
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal{{ $penjualans->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Sale {{ $penjualans->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>Nama Pelanggan: {{ $penjualans->pelanggan->nama_pelanggan }}</div>
                <div>Alamat Pelanggan: {{ $penjualans->pelanggan->alamat }}</div>
                <div>Nomor Pelanggan : {{ $penjualans->pelanggan->no_telp }}</div>
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
                        @foreach ($penjualans->detailPenjualans as $item)
                        <tr>
                            <td>{{ $item->produk->nama_produk }}</td>
                            <td>{{ $item->jumlah_produk }}</td>
                            <td>Rp{{ number_format($item->produk->harga, 0, ',' . '.') }}</td>
                            <td>Rp{{ number_format($item->subtotal, 0, ',' . '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>Total Harga: Rp{{ number_format($penjualans->total_harga, 0, ',' . '.') }}</div>
        </div>
        
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
