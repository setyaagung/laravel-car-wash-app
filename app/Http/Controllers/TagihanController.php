<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagihan;

class TagihanController extends Controller
{
    public function index(Request $request)
    {
        $data_tagihan = Tagihan::all();
        return view('master/tagihan/tagihan', compact('data_tagihan'));
    }

    public function create(Request $request)
    {
        //validasi
    	$this->validate($request, [
            'kategori' => 'required',
        ]);

        Tagihan::create([
            'kategori' => $request->kategori,
        ]);
        return redirect('/tagihan')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function edit(Shift $shift)
    {
        return view('master/tagihan/edit', compact('tagihan'));
    }

    public function update(Request $request, Tagihan $tagihan)
    {
        $this->validate($request, [
            'kategori' => 'required',
        ]);

        $tagihan->update($request->all());
        return redirect('/tagihan')->with('update', 'Data Berhasil diperbarui');
    }

    public function delete(Tagihan $tagihan)
    {
        Tagihan::destroy($tagihan->id);
        return redirect('/tagihan')->with('delete', 'Data Berhasil Dihapus');
    }
}
