@extends('layouts.index')

@section('title', '| Data Produk')

@section('content.index')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">Data Produk</li>
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
                            <!-- Tombol Tambah Produk -->
                            <a href="{{ route('formproduk') }}" class="btn btn-primary mb-3">Tambah Produk</a>
                            
                            <!-- Tabel Produk -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $item)
                                        <tr>
                                             <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td> <!-- Updated -->
                                            <td>{{ $item->stok }}</td>
                                            <td>
                                                <img src="{{ asset($item->gambar) }}" width="60px" alt="">
                                            </td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                                
                                                <!-- Tombol Hapus -->
                                                <a href="{{ route('produk.hapus', $item->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                
                                                <!-- Tombol Update Stok (Modal) -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdateStok{{ $item->id }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
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

    <!-- Modal Update Stok -->
    @foreach ($produk as $item)
       <div class="modal fade" id="modalUpdateStok{{ $item->id }}" tabindex="-1" aria-labelledby="modalUpdateStokLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateStokLabel{{ $item->id }}">Update Stok Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formUpdateStok{{ $item->id }}" onsubmit="updateStok({{ $item->id }}); return false;">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="stok{{ $item->id }}">Stok Baru:</label>
                        <input type="number" class="form-control" id="stok{{ $item->id }}" name="stok" value="" placeholder="Masukkan stok baru" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

    @endforeach
@endsection

<script>
    function updateStok(id) {
        var stokBaru = document.getElementById('stok' + id).value;

        // Mengirimkan permintaan AJAX
        $.ajax({
            url: '/produk/update-product/' + id,
            type: 'PUT',
            data: {
                stok: stokBaru,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.message);
                // Di sini Anda dapat melakukan tindakan tambahan jika diperlukan, seperti me-refresh halaman
                location.reload();
            },
            error: function(xhr) {
                alert('Terjadi kesalahan saat memperbarui stok');
            }
        });
    }
</script>

