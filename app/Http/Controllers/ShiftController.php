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
}
