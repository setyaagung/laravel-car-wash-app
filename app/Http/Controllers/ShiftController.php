<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Shift;

class ShiftController extends Controller
{
    public function index(Request $request)
    {
        $data_shift = Shift::all();
        return view('master/shift/shift', compact('data_shift'));
    }

    public function create(Request $request)
    {
        //validasi
    	$this->validate($request, [
            'nama_shift' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

       $shift = Shift::create($request->all());
        return redirect('/shift')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function edit(Shift $shift)
    {
        return view('master/shift/edit', compact('shift'));
    }

    public function update(Request $request, Shift $shift)
    {
        $this->validate($request, [
            'nama_shift' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

        $shift->update($request->all());
        return redirect('/shift')->with('update', 'Data Berhasil diperbarui');
    }

    public function delete($id)
    {
        Shift::where('id_shift', $id)->delete();
        return redirect('/shift')->with('delete', 'Data Berhasil Dihapus');
    }
}
