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
                            <a href="" class="btn btn-primary mb-3">Export Penjualan (.xlsx)</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal Penjualan</th>
                                        <th>Total Harga</th>
                                        <th>Dibuat Oleh</th>
                                        <th style="width: 115px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            <a href="" class="btn btn-success" ><i class="nav-icon fas fa-eye"></i></a>
                                            <a href="" class="btn btn-primary"><i class="nav-icon fas fa-download"></i></a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
