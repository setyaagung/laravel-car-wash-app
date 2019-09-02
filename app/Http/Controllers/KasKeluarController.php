<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KasKeluar;
use App\User;
use App\Tagihan;
use App\Shift;

class KasKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kaskeluar = KasKeluar::join();
        return view('kas/kaskeluar/kas_keluar', compact('kaskeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $tagihan = Tagihan::all();
        $shift = Shift::all();
        return view('kas/kaskeluar/create', compact('user','tagihan','shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'user_id' => 'required',
            'shift_id' => 'required',
            'tagihan_id' => 'required',
            'jumlah' => 'required',
            'ket' => 'required',
        ]);
        $kaskeluar = KasKeluar::create($request->all());
        $kaskeluar->save();

        return redirect('/kas_keluar')->with('create', 'Data Kas Keluar Berhasil diinputkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KasKeluar::where('id_kk', $id)->delete();
        return redirect('/kas_keluar')->with('delete', 'Data Kas Keluar Berhasil Dihapus');
    }
}
