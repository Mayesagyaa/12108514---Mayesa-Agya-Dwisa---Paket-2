@extends('layouts.index')

@section('title', '| Form Produk')

@section('content.index')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('produk') }}">Produk</a></li>
                        <li class="breadcruamb-item active">Form Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <form action="{{ isset($produk) ? route('produk.edit.update', $produk->id) : route('formproduk') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($produk))
                            @method('PATCH')
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_produk">Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    placeholder="Masukan produk" value="{{ isset($produk) ? $produk->nama_produk : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    placeholder="Masukan harga produk" value="{{ isset($produk) ? $produk->harga : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok"
                                    placeholder="Masukan stok" value="{{ isset($produk) ? $produk->stok : '' }}" disabled>
                                    <input type="hidden" name="stok" value="{{ isset($produk) ? $produk->stok : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control mb-3" id="gambar" name="gambar"
                                    placeholder="Masukan gambar">
                                @if (isset($produk) && $produk->gambar)
                                    <img src="{{ asset($produk->gambar) }}"  width="80px" alt="Gambar Produk">
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('produk') }}" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
