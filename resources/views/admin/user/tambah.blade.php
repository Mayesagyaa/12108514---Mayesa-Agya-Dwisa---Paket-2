@extends('layouts.index')

@section('title', '| Tambah User')

@section('content.index')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah User</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <form method="POST" action="{{ route ('kirim-data')}}"  enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="card-body">
                            <div class="form-grup">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                                <div class="invalid-feedback">Masukkan alamat email yang valid.</div>
                            </div>
                            <div class="form-grup">
                                <label for="exampleInputRole1" class="form-label">Role</label>
                                <select class="form-select" id="exampleInputRole1" name="role" required>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                                <div class="invalid-feedback">Pilih role user.</div>
                            </div>
                            <div class="form-grup">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" id="exampleInputFile" name="name" required>
                                <div class="invalid-feedback">Nama harus diisi.</div>
                            </div>
                            <div class="form-grup">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="invalid-feedback">Password harus diisi.</div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('user') }}" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
