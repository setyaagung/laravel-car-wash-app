<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard')->with('sukses', 'Selamat Datang Di Car Wash TJ88');
        }
        return redirect('/')->with('failed', 'username dan password anda tidak sesuai');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
