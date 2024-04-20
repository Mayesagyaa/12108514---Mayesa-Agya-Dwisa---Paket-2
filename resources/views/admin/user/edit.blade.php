@extends('layouts.index')

@section('title', '| Edit User')

@section('content.index')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <form method="POST" action="" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        @method()
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-control">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $user->email }}" required>
                                <div class="invalid-feedback">Email harus diisi.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputRole1" class="form-control">Role</label>
                                <select class="form-select" id="exampleInputRole1" name="role" required>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                                <div class="invalid-feedback">Pilih role user.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" id="exampleInputFile" name="name" value="{{ $user->name }}" required>
                                <div class="invalid-feedback">Nama harus diisi.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-control">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                                <div class="invalid-feedback">Password harus diisi.</div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection










































































































































































































































































































{{-- @extends('layouts.index')

@section('title', '| Edit User')

@section('content.index')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <form method="POST" action="{{ route('updateUser', $user->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-control">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $user->email }}" required>
                                <div class="invalid-feedback">Email harus diisi.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputRole1" class="form-control">Role</label>
                                <select class="form-select" id="exampleInputRole1" name="role" required>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                </select>
                                <div class="invalid-feedback">Pilih role user.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" id="exampleInputFile" name="name" value="{{ $user->name }}" required>
                                <div class="invalid-feedback">Nama harus diisi.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-control">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                                <div class="invalid-feedback">Password harus diisi.</div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('user') }}" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
 --}}
