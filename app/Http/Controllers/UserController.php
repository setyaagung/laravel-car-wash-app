<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data_user = User::all();
        return view('master/user/user', compact('data_user'));
    }

    public function create(Request $request)
    {
        //validasi
    	$this->validate($request, [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password'=> 'required',
        ]);
        $user = new \App\User;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(60);
        $user->save();
        return redirect('/user')->with('create', 'Data Berhasil Ditambahkan');
    }
    
    public function edit(User $user)
    {
        return view('master/user/edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $user->update($request->all());
        return redirect('/user')->with('update', 'Data Berhasil diperbarui');
    }

    public function delete(User $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with('delete', 'Data Berhasil Dihapus');
    }
}
