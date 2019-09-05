<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class LaporanKasKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::all();
        $tagihan = \App\Tagihan::all();
        $shift = \App\Shift::all();
        return view('laporan.laporan_kk.index',compact('user','shift','tagihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function cari(Request $request)
    {
        $user = \App\User::all();
        $tagihan = \App\Tagihan::all();
        $shift = \App\Shift::all();
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required',
            'shift_id' => 'required'
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));
        $shift_id = $request->shift_id;

        if($shift_id == 'null'){
            $kaskeluar = \DB::table('kas_keluar')
                        ->join('users','kas_keluar.user_id', '=', 'users.id_user')
                        ->join('shift','kas_keluar.shift_id', '=', 'shift.id_shift')
                        ->join('tagihan','kas_keluar.tagihan_id', '=', 'tagihan.id_tagihan')
                        ->whereBetween('tanggal',[$dari,
                                    $sampai])->get();

            $totalkaskeluar = \DB::table('kas_keluar')
                        ->join('users','kas_keluar.user_id', '=', 'users.id_user')
                        ->join('shift','kas_keluar.shift_id', '=', 'shift.id_shift')
                        ->join('tagihan','kas_keluar.tagihan_id', '=', 'tagihan.id_tagihan')
                        ->whereBetween('tanggal',[$dari,
                                    $sampai])->sum('jumlah');
        }
        else{
            $kaskeluar = \DB::table('kas_keluar')
                        ->join('users','kas_keluar.user_id', '=', 'users.id_user')
                        ->join('shift','kas_keluar.shift_id', '=', 'shift.id_shift')
                        ->join('tagihan','kas_keluar.tagihan_id', '=', 'tagihan.id_tagihan')
                        ->where('shift_id',$shift_id)->whereBetween('tanggal',[$dari,
                                    $sampai])->get();

            $totalkaskeluar = \DB::table('kas_keluar')
                        ->join('users','kas_keluar.user_id', '=', 'users.id_user')
                        ->join('shift','kas_keluar.shift_id', '=', 'shift.id_shift')
                        ->join('tagihan','kas_keluar.tagihan_id', '=', 'tagihan.id_tagihan')
                        ->where('shift_id',$shift_id)->whereBetween('tanggal',[$dari,
                                    $sampai])->sum('jumlah');
        }                        

        return view('laporan.laporan_kk.index', compact('kaskeluar','shift','tagihan','user', 'totalkaskeluar','dari','sampai','shift_id'));
    }

    public function pdf($dari, $sampai, $shift_id)
    {
        if($shift_id == 'null'){
            $kaskeluar = \DB::table('kas_keluar')
                        ->join('users','kas_keluar.user_id', '=', 'users.id_user')
                        ->join('shift','kas_keluar.shift_id', '=', 'shift.id_shift')
                        ->join('tagihan','kas_keluar.tagihan_id', '=', 'tagihan.id_tagihan')
                        ->whereBetween('tanggal',[$dari,
                                    $sampai])->get();

            $totalkaskeluar = \DB::table('kas_keluar')
                        ->join('users','kas_keluar.user_id', '=', 'users.id_user')
                        ->join('shift','kas_keluar.shift_id', '=', 'shift.id_shift')
                        ->join('tagihan','kas_keluar.tagihan_id', '=', 'tagihan.id_tagihan')
                        ->whereBetween('tanggal',[$dari,
                                    $sampai])->sum('jumlah');
        }
        else{
            $kaskeluar = \DB::table('kas_keluar')
                        ->join('users','kas_keluar.user_id', '=', 'users.id_user')
                        ->join('shift','kas_keluar.shift_id', '=', 'shift.id_shift')
                        ->join('tagihan','kas_keluar.tagihan_id', '=', 'tagihan.id_tagihan')
                        ->where('shift_id',$shift_id)->whereBetween('tanggal',[$dari,
                                    $sampai])->get();

            $totalkaskeluar = \DB::table('kas_keluar')
                        ->join('users','kas_keluar.user_id', '=', 'users.id_user')
                        ->join('shift','kas_keluar.shift_id', '=', 'shift.id_shift')
                        ->join('tagihan','kas_keluar.tagihan_id', '=', 'tagihan.id_tagihan')
                        ->where('shift_id',$shift_id)->whereBetween('tanggal',[$dari,
                                    $sampai])->sum('jumlah');
        }
        $pdf = PDF::loadView('export.kas-keluar', compact('kaskeluar','totalkaskeluar'));
        return $pdf->download('kas-keluar.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
