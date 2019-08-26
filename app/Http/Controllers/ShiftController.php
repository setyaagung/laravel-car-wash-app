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
            'nama' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

        Shift::create([
            'nama' => $request->nama,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
        ]);
        return redirect('/shift')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function edit(Shift $shift)
    {
        return view('master/shift/edit', compact('shift'));
    }

    public function update(Request $request, Shift $shift)
    {
        $this->validate($request, [
            'nama' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

        Shift::where('id', $shift->id)
        ->update([
            'nama' => $request->nama,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
        ]);
        return redirect('/shift')->with('update', 'Data Berhasil diperbarui');
    }

    public function delete(Shift $shift)
    {
        Shift::destroy($shift->id);
        return redirect('/shift')->with('delete', 'Data Berhasil Dihapus');
    }
}
