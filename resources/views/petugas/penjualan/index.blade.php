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
                                    <td>{{ $penjualans->pelanggan_id }}</td>
                                    <td>{{ $penjualans->tgl_penjualan }}</td>
                                    <td>{{ $penjualans->total_harga }}</td>
                                    <td>{{ $penjualans->created_by }}</td>
                                    <td>
                                        <a href="" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-primary"><i class="fas fa-download"></i></a>
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
@endsection
