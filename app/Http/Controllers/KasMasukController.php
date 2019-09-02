<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KasMasuk;
use App\User;
use App\Layanan;
use App\Shift;

class KasMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasmasuk = KasMasuk::join();
        return view('kas/kasmasuk/kas_masuk', compact('kasmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $layanan = Layanan::all();
        $shift = Shift::all();
        return view('kas/kasmasuk/create', compact('user','layanan','shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new KasMasuk();
        $data->tanggal = $request->tanggal;
        $data->user_id = $request->user_id;
        $data->shift_id = $request->shift_id;
        $data->layanan_id = $request->layanan_id;
        $data->harga = $request->harga;
        $data->jumlah = $request->jumlah;
        $data->total = $request->total;
        $data->save();

        return redirect('/kas_masuk')->with('create', 'Data Kas Masuk Berhasil diinputkan');
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
        KasMasuk::where('id_km', $id)->delete();
        return redirect('/kas_masuk')->with('delete', 'Data Kas Masuk Berhasil Dihapus');
    }
}
