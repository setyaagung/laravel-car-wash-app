<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Supplier;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $data_supplier = Supplier::all();
        return view('master/supplier/supplier', compact('data_supplier'));
    }

    public function create(Request $request)
    {
        //validasi
    	$this->validate($request, [
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $supplier = Supplier::create($request->all());
        return redirect('/supplier')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function edit(Supplier $supplier)
    {
        return view('master/supplier/edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
        
        $supplier->update($request->all());
        return redirect('/supplier')->with('update', 'Data Berhasil diperbarui');
    }

    public function delete($id)
    {
        Supplier::where('id_supplier', $id)->delete();
        return redirect('/supplier')->with('delete', 'Data Supplier Berhasil Dihapus');
    }
}
