<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GantiPasswordController extends Controller
{
    public function index()
    {
        return view('auth/ganti-password');
    }

    public function gantiPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect('/')->with('sukses', 'Password Berhasil Diperbarui');
        } else {
            return redirect()->back()->with('gagal', 'Password tidak valid');
        }
    }
}
