<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $penjualan = \App\Penjualan::join()->groupBy('layanan_id');
        $layanan = \App\Layanan::all();

        $count = \App\Penjualan::all();
        return view('dashboard', compact('penjualan','count','layanan'));
    }
}
