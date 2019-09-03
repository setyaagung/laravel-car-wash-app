<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class LaporanKasMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::all();
        $layanan = \App\Layanan::all();
        $shift = \App\Shift::all();
        return view('laporan.laporan_km.index',compact('user','shift','layanan'));   //
    }

    public function cari(Request $request)
    {
        $user = \App\User::all();
        $layanan = \App\Layanan::all();
        $shift = \App\Shift::all();
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required',
            'shift_id' => 'required'
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));
        $shift_id = $request->shift_id;

        $kasmasuk = \DB::table('kas_masuk')
                    ->join('users','kas_masuk.user_id', '=', 'users.id_user')
                    ->join('shift','kas_masuk.shift_id', '=', 'shift.id_shift')
                    ->join('layanan','kas_masuk.layanan_id', '=', 'layanan.id_layanan')
                    ->where('shift_id',$shift_id)->whereBetween('tanggal',[$dari,
                                $sampai])->get();
        
        $totalkasmasuk = \DB::table('kas_masuk')
                    ->join('users','kas_masuk.user_id', '=', 'users.id_user')
                    ->join('shift','kas_masuk.shift_id', '=', 'shift.id_shift')
                    ->join('layanan','kas_masuk.layanan_id', '=', 'layanan.id_layanan')
                    ->where('shift_id',$shift_id)->whereBetween('tanggal',[$dari,
                                $sampai])->sum('total');                        

        return view('laporan.laporan_km.index', compact('kasmasuk','shift','layanan','user', 'totalkasmasuk','dari','sampai','shift_id'));
    }

    public function pdf($dari, $sampai, $shift_id)
    {

        $kasmasuk = \DB::table('kas_masuk')
                    ->join('users','kas_masuk.user_id', '=', 'users.id_user')
                    ->join('shift','kas_masuk.shift_id', '=', 'shift.id_shift')
                    ->join('layanan','kas_masuk.layanan_id', '=', 'layanan.id_layanan')
                    ->where('shift_id',$shift_id)->whereBetween('tanggal',[$dari,
                                $sampai])->get();
        
        $totalkasmasuk = \DB::table('kas_masuk')
                    ->join('users','kas_masuk.user_id', '=', 'users.id_user')
                    ->join('shift','kas_masuk.shift_id', '=', 'shift.id_shift')
                    ->join('layanan','kas_masuk.layanan_id', '=', 'layanan.id_layanan')
                    ->where('shift_id',$shift_id)->whereBetween('tanggal',[$dari,
                                $sampai])->sum('total');  

        $pdf = PDF::loadView('export.kas-masuk', compact('kasmasuk','totalkasmasuk'));
        return $pdf->download('kas-masuk.pdf');
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
