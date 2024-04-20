<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Penjualan;

class PetugasController extends Controller
{
    public function index()
    {
        return view('petugas.dashboard');
    }

    public function petugas()
    {
        return view('petugas.index');
    }

    public function tampilkanPenjualan()
    {
        $penjualan = Produk::all(); // Mengambil semua data penjualan
        return view('petugas.penjualan.index', compact('penjualan')); // Meneruskan data penjualan ke tampilan
    }

    public function simpanPenjualan(Request $request)
    {
        // Validasi request
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'nomor_telepon' => 'required',
            'produk_id.*' => 'required|exists:produks,id',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        // Simpan data penjualan
        $penjualan = new Penjualan();
        $penjualan->nama_pelanggan = $request->nama_pelanggan;
        $penjualan->alamat_pelanggan = $request->alamat_pelanggan;
        $penjualan->nomor_telepon = $request->nomor_telepon;
        $penjualan->save();

        // Simpan detail penjualan
        for ($i = 0; $i < count($request->produk_id); $i++) {
            $penjualan->produks()->attach($request->produk_id[$i], ['jumlah' => $request->jumlah[$i]]);
        }

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Penjualan berhasil disimpan.');
    }
}
