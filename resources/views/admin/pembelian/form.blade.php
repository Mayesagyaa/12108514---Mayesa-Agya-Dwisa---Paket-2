@extends('layouts.index')

@section('title', '| Form Meja')

@section('content.index')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Meja</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="">Meja</a></li>
                        <li class="breadcrumb-item active">Form Meja</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Meja</label>
                                <input type="" class="form-control" id="" name="" placeholder="Tambah meja">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="" class="form-control" id="" name="" placeholder="Masukan jumlah meja">
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
