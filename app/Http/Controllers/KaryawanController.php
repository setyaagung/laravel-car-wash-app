<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Tanggungan;
use App\Absensi;
use PDF;

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
            'gaji' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);

        $karyawan = Karyawan::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $karyawan->avatar = $request->file('avatar')->getClientOriginalName();
            $karyawan->save();
        }
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
            'gaji' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',

        ]);

        $karyawan->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $karyawan->avatar = $request->file('avatar')->getClientOriginalName();
            $karyawan->save();
        }
        return redirect('/karyawan')->with('update', 'Data Berhasil diperbarui');
    }

    public function profile(Karyawan $karyawan)
    {
        $tanggungankaryawan = Tanggungan::all();
        $absensikaryawan = Absensi::all();
        return view('master/karyawan/profile', compact(['karyawan', 'tanggungankaryawan', 'absensikaryawan']));
    }

    public function addtanggungan(Request $request, $id_karyawan)
    {
        $karyawan = Karyawan::find($id_karyawan);
        $tanggungan = Tanggungan::create([
            'karyawan_id' => $id_karyawan,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'status' => $request->status
        ]);

        $karyawan->tanggungan()->save($tanggungan);

        return redirect('karyawan/' . $id_karyawan . '/profile')->with('create', 'Data Tanggungan Berhasil Ditambahkan');
    }

    public function addabsensi(Request $request, $id_karyawan)
    {
        $karyawan = Karyawan::find($id_karyawan);
        $absensi = Absensi::create([
            'karyawan_id' => $id_karyawan,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'denda' => $request->denda
        ]);

        $karyawan->absensi()->save($absensi);

        return redirect('karyawan/' . $id_karyawan . '/profile')->with('create', 'Data Absensi Berhasil Ditambahkan');
    }

    public function deletetanggungan(Karyawan $karyawan, $id_tanggungan)
    {
        $karyawan->tanggungan()->delete($id_tanggungan);
        return redirect()->back()->with('delete', 'Data Tanggungan Berhasil Dihapus');
    }

    public function deleteabsensi(Karyawan $karyawan, $id_absensi)
    {
        $karyawan->absensi()->delete($id_absensi);
        return redirect()->back()->with('delete', 'Data Absensi Berhasil Dihapus');
    }

    public function gaji(Karyawan $karyawan)
    {
        $tanggungankaryawan = Tanggungan::all();
        $absensikaryawan = Absensi::all();

        $pdf = PDF::loadView('export.gaji', compact('tanggungankaryawan', 'absensikaryawan', 'karyawan'))->setPaper('a4', 'landscape');
        return $pdf->download('gaji.pdf');
    }

    public function delete($id)
    {
        Karyawan::where('id_karyawan', $id)->delete();
        return redirect('/karyawan')->with('delete', 'Data Karyawan Berhasil Dihapus');
    }
}
