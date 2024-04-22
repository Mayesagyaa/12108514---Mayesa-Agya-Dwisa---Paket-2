@extends('petugas.index')

@section('title', 'Penjualan')

@section('content.index')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('petugas.checkout.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <table style="width: 100%;">
                                <thead>
                                    <h2>Product selected</h2>
                                </thead>
                                <tbody>
                                    @php
                                    $total = [];
                                    @endphp
                                    @foreach ($shop as $item)
                                    @php
                                    array_push($total, explode(";", $item)[4])
                                    @endphp
                                    <input type="hidden" name="shop[]" value="{{ $item }}" hidden="">
                                    <tr>
                                        <td>{{ explode(";", $item)[1] }} <br> <small>$
                                                {{ number_format(explode(";", $item)[2], '0', ',', '.') }} X
                                                {{ explode(";", $item)[3] }}</small></td>
                                        <td><b>$ {{ number_format(explode(";", $item)[4], '0', ',', '.') }}</b></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td style="padding-top: 20px; font-size: 20px;"><b>Total</b></td>
                                        <td class="tex-end" style="padding-top: 20px; font-size: 20px;"><b>$
                                                {{ number_format(array_sum($total), '0', ',', '.') }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="text" name="total" value="{{ array_sum($total) }}" hidden="">
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-12">Nama Pelanggan <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="nama_pelanggan"
                                                class="form-control form-control-line" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-12">Alamat Pelanggan <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <textarea name="alamat" class="form-control form-control-line"
                                                required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-12">No Telepon <span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="number" name="no_telp" class="form-control form-control-line"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-end">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Pesan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
