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
    
    // public function createPenjualan()
    // {
    //     $produk = Produk::all();
    //     return view('petugas.penjualan.create', compact('produks'));
    // }

    public function tambahPenjualan()
    {
        $produk = Produk::all();
        return view('petugas.penjualan.form',compact('produk'));
    }
}

