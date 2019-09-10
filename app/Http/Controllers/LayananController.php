<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;

class LayananController extends Controller
{

    public function index(Request $request)
    {
        $data_layanan = Layanan::all();
        return view('master/layanan/layanan', compact('data_layanan'));
    }

    public function create(Request $request)
    {
        //validasi
        $this->validate($request, [
            'kategori' => 'required',
            'nama_layanan' => 'required|min:3',
            'harga' => 'required',
        ]);

        Layanan::create([
            'kategori' => $request->kategori,
            'nama_layanan' => $request->nama_layanan,
            'harga' => $request->harga,
        ]);
        return redirect('/layanan')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function edit(Layanan $layanan)
    {
        return view('master/layanan/edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $this->validate($request, [
            'kategori' => 'required',
            'nama_layanan' => 'required|min:3',
            'harga' => 'required',
        ]);

        Layanan::where('id_layanan', $layanan->id_layanan)
            ->update([
                'kategori' => $request->kategori,
                'nama_layanan' => $request->nama_layanan,
                'harga' => $request->harga
            ]);
        return redirect('/layanan')->with('update', 'Data Berhasil diperbarui');
    }

    public function delete($id)
    {
        Layanan::where('id_layanan', $id)->delete();
        return redirect('/layanan')->with('delete', 'Data Berhasil Dihapus');
    }
}
