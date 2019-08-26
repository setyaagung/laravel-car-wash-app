<?php

namespace App\Http\Controllers;
use App\Karyawan;
use App\Tanggungan;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $data_karyawan = Karyawan::all();
        return view('master/karyawan/karyawan', compact('data_karyawan'));
    }

    public function create(Request $request)
    {
        //validasi
    	$this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'job' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'gaji' => 'required'
        ]);

        Karyawan::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'job' => $request->job,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'gaji' => $request->gaji,
        ]);
        return redirect('/karyawan')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function edit(Karyawan $karyawan)
    {
        return view('master/karyawan/edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'job' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'gaji' => 'required'
        ]);

        Karyawan::where('id', $karyawan->id)
        ->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'job' => $request->job,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'gaji' => $request->gaji,
        ]);
        return redirect('/karyawan')->with('update', 'Data Berhasil diperbarui');
    }

    public function profile(Karyawan $karyawan)
    {
        $tanggungankaryawan = Tanggungan::all();
        return view('master/karyawan/profile', compact(['karyawan','tanggungankaryawan']));
    }

    public function addtanggungan(Request $request, $id_karyawan)
    {
        $karyawan = Karyawan::find($id_karyawan);
        
        $karyawan->tanggungan()->attach($request->tanggungan, ['keterangan' => $request->keterangan, 'jumlah' => $request->jumlah, 'status' => $request->status]);

        return redirect('karyawan/'.$id_karyawan.'/profile')->with('create','Data Tanggungan Berhasil Ditambahkan');
    }

    public function delete(Karyawan $karyawan)
    {
        Karyawan::destroy($karyawan->id);
        return redirect('/karyawan')->with('delete', 'Data Berhasil Dihapus');
    }
}
