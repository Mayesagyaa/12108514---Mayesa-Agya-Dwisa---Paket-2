<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard');
    }

    public function petugas(){
        return view ('petugas.produk.index');
    }

    public function user(){
        $user = User::all();
        return view ('admin.user.index', compact('user'));
    }

    public function pembelian()
    {
        $penjualans = Penjualan::all();
        return view('admin.pembelian.index', compact('penjualans'));
    }

    public function tambah(){
        return view('admin.user.tambah');
    }
    
    function tambahUser(request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required|in:admin,petugas',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/user');
    }

    public function destroy($id)
{
    // Temukan data yang akan dihapus berdasarkan ID
    $data = User::findOrFail($id);

    // Hapus data
    $data->delete();

    // Redirect atau kembali ke halaman sebelumnya
    return redirect()->back()->with('success', 'Data berhasil dihapus');
}

    public function editUsers($id)
    {
        $user= User::where('id',$id)->first();
        return view('admin.user.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required|in:admin,petugas',
            'password' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('/user')->with('edit user', 'Berhasil edit user');
    }
}
    
