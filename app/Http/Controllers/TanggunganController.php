<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tanggungan;

class TanggunganController extends Controller
{
    public function index(Request $request)
    {
        $data_tanggungan = Tanggungan::all();
        return view('master/tanggungan/tanggungan', compact('data_tanggungan'));
    }

    public function create(Request $request)
    {
        //validasi
    	$this->validate($request, [
            'kategori' => 'required',
        
        ]);

        Tanggungan::create([
            'kategori' => $request->kategori,
            
        ]);
        return redirect('/tanggungan')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function delete(Tanggungan $tanggungan)
    {
        Tanggungan::destroy($tanggungan->id);
        return redirect('/tanggungan')->with('delete', 'Data Berhasil Dihapus');
    }
}
