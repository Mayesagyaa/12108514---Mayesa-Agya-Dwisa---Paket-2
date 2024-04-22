<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\DetailPenjualan;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;


class PenjualanController extends Controller
{


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
// Menampilkan detail penjualan
public function detail($id)
{
    $penjualan = Penjualan::findOrFail($id);
    // Pass the $penjualan variable to the view
    return view('petugas.penjualan.index', compact('penjualan'));
}


// Menghapus penjualan
public function hapus($id)
{
    // Cari data penjualan berdasarkan ID
    $penjualan = Penjualan::findOrFail($id);

    // Hapus data penjualan
    $penjualan->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('petugas.pesan_item')->with('success', 'Penjualan berhasil dihapus.');
}


    public function tambahJumlah(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $jumlah = $request->input('jumlah', 1);
        
        // Periksa apakah jumlah yang ditambahkan melebihi stok
        if ($jumlah > $produk->stok) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi');
        }

        // Perbarui stok dan harga total
        $produk->stok -= $jumlah;
        $produk->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang');
    }

    public function kurangJumlah($id)
    {
        $produk = Produk::findOrFail($id);
        
        // Perbarui stok
        $produk->stok += 1;
        $produk->save();

        // Redirect ke halaman sebelumnya
        return redirect()->back();
    }

    public function updateJumlah(Request $request, $id)
{
    $produk = Produk::findOrFail($id);
    $jumlah = $request->input('jumlah', 1);
    
    if ($request->input('action') == 'tambah') {
        if ($jumlah > $produk->stok) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }
        $produk->stok -= $jumlah;
    } elseif ($request->input('action') == 'kurang') {
        $produk->stok += $jumlah;
    }
    
    $produk->save();
    return redirect()->back()->with('success', 'Update jumlah produk berhasil.');
}

    public function transaction(Request $request) {
        $products = $request->shop;
        if($products){
            $shop = [];
            foreach($products as $items) {
                $item = explode(";", $items);
                if($item[3] != '0'){
                    $shop[] = $items;
                }
            }
            if(count($shop) == 0) {
                return back();
            }
            // return response()->json($shop);
            return view('petugas.penjualan.transaction', compact('shop'));
        }
        return back();
    }

    public function transactionStore(Request $request)
    {
        $pelanggan = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
        ];
        $user = Pelanggan::where([
            'nama_pelanggan' => $pelanggan['nama_pelanggan'],
            'alamat' => $pelanggan['alamat']
            ])->first();
        if(!$user){
            Pelanggan::create($pelanggan);
            $user = Pelanggan::latest()->first();
        }
        $products = $request->shop;
        $shop = [];
        $total = 0;
        if(count($products) > 0) {
            foreach($products as $product) {
                $items = explode(";", $product);
                $shop[] = [
                    'id' => intval($items[0]),
                    'nama_produk' => $items[1],
                    'harga' => intval($items[2]),
                    'jumlah_produk' => intval($items[3]),
                    'subtotal' => intval($items[4])
                ];
                $total += intval($items[4]);
            }
            Penjualan::create([
                'pelanggan_id' => $user->id,
                'user_id' => Auth::user()->id,
                'total_harga' => $total
            ]);
            foreach($shop as $product) {
                DetailPenjualan::create([
                    'penjualan_id' => Penjualan::latest()->first()->id,
                    'jumlah_produk' => $product['jumlah_produk'],
                    'subtotal' => $product['subtotal'],
                    'produk_id' => $product['id'],
                ]);
                Produk::findOrFail($product['id'])->update([
                    'stok' => Produk::find($product['id'])->stok - $product['jumlah_produk']
                ]);
            }
        }
        return redirect()->route('petugas.pesan_item');
    }



public function downloadPDF($id)
{
    $penjualan = Penjualan::findOrFail($id);
    $pdf = new Dompdf();
    $pdf->loadHtml(view('penjualan.pdf', compact('penjualan')));
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    return $pdf->stream('detail_pembelian.pdf');
}


}

