<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {

        //request bahwa email dan pass harus diisi
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        //validate untuk memeriksa apakah email dan password sesuai

        $infologin = [
            'email'=> $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('/admin');
            } elseif (Auth::user()->role == 'petugas'){
                return redirect('/petugas');
            }
        }else{
            return redirect('')->withErrors('Username dan Password yang dimasukan tidak sesuai')->withInput();
        }
    }

        function logout()
        {
            Auth::logout();
            return redirect('');
        }

    }