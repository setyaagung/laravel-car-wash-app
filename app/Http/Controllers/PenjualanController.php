<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = \App\Penjualan::join();
        return view('transaksi.penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penjualan = \App\Penjualan::join()->where('status','0');
        $user = \App\User::all();
        $layanan = \App\Layanan::all();
        $shift = \App\Shift::all();
        return view('transaksi/penjualan/create', compact('penjualan','user','layanan','shift'));
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
            'layanan_id' => 'required',
            'jumlah' => 'required'
        ]);

        $penjualan = \App\Penjualan::create($request->except('submit'));
        return redirect()->route('penjualan.create');
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
        $penjualan = \App\Penjualan::findOrFail($id);
        if(!$penjualan){
            return redirect()->back();
        }
        $penjualan->delete();
        return redirect()->back();
    }

    public function save()
    {
        $penjualan = \App\Penjualan::where('status','0');
        $penjualan->update(['status'=>'1']);
        return redirect('/penjualan')->with('create','Transaksi Penjualan Berhasil Diinputkan');
    }
}
