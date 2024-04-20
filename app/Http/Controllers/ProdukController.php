<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::get();
        return view('admin.produk.index', compact('produk'));
    }

    public function tambah()
    {
        return view('admin.produk.form');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($gambar = $request->file('gambar')) {
            $profileImage = date('YmdHis') . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('upload/'), $profileImage);
            $input['gambar'] = 'upload/' . $profileImage;
        }
        $input['stok'] = 0;

        Produk::create($input);
        return redirect()->route('produk');
    }

    public function edit($id)
    {
        $produk = Produk::find($id)->first();
        return view('admin.produk.edit-stok', ['produk' => $produk]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $produk = Produk::find($id);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $destinationPath = 'upload/';

            // Jika gambar lama ada, hapus gambar lama dari folder upload
            if ($produk->gambar && file_exists(public_path($produk->gambar))) {
                unlink(public_path($produk->gambar));
            }

            $profileImage = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $profileImage);
            $input['gambar'] = "upload/$profileImage";
        } else {
            // Jika tidak ada gambar baru yang diunggah, hapus input gambar dari data yang akan diupdate
            unset($input['gambar']);
        }

        $produk->update($input);
        return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui');
    }

    public function hapus($id)
    {
        Produk::find($id)->delete();
        return redirect()->route('produk');
    }

    public function updateStok(Request $request, $id)
{
    // Validasi input stok
    $request->validate([
        'stok' => 'required|numeric',
    ]);

    // Temukan produk berdasarkan ID
    $produk = Produk::findOrFail($id);

    // Update stok produk dengan nilai baru dari request
    $message = $produk->update([
        'stok' => $request->stok,
    ]);

    // Redirect kembali dengan pesan 
    if($message){
        return response(['message' => 'Update stock successfully']);
    }

}

public function indexPetugas()
{
    $produk = Produk::all(); // Mengambil semua data produk
    return view('petugas.produk.produkPetugas', compact('produk')); // Mengirim data produk ke view
}

    

}

    

