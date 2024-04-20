@extends('petugas.index')

@section('title', 'Data Produk Petugas')

@section('content.index')
<div class="container my-4">
    <h3 class="mb-4">Data Produk</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <img src="" style="width: 50px; height: auto;">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection






























































































































































































































































































































{{-- @extends('petugas.index')

@section('title', 'Data Produk Petugas')

@section('content.index')
<div class="container my-4">
    <h3 class="mb-4">Data Produk</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $index => $produk)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>Rp{{ number_format($produk->harga, 2, ',', '.') }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>
                        <img src="{{ asset($produk->gambar) }}" alt="{{ $produk->nama_produk }}" style="width: 50px; height: auto;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
 --}}