<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function tampilkanPenjualan()
    {
        $penjualan = Penjualan::all(); // Mengambil semua data penjualan
        return view('petugas.penjualan.index', compact('penjualan')); // Meneruskan data penjualan ke tampilan
    }

    // Menampilkan halaman tambah penjualan
    public function tambah()
    {
        return view('penjualan.tambah');
    }

    // Menyimpan data penjualan baru
    public function simpan(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'alamat_pelanggan' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Simpan data penjualan ke database
        $penjualan = new Penjualan();
        $penjualan->nama_pelanggan = $request->nama_pelanggan;
        $penjualan->alamat_pelanggan = $request->alamat_pelanggan;
        $penjualan->nomor_telepon = $request->nomor_telepon;
        // tambahkan field lainnya sesuai kebutuhan
        $penjualan->save();

        // Redirect dengan pesan sukses
        return redirect()->route('detail_penjualan', $penjualan->id)
            ->with('success', 'Penjualan berhasil disimpan.');
    }

    // Menampilkan detail penjualan
    public function detail($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualan.detail', compact('penjualan'));
    }

    // Menghapus penjualan
    public function hapus($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();
        return redirect()->route('produk_petugas')->with('success', 'Penjualan berhasil dihapus.');
    }
}

