<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = supplier::orderBy('id', 'desc')->get();

        return view('admin.barang.supplier.index', compact('supplier'));
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
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([

            'supplier' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
        ], $messages);

        // create new object
        $supplier = new supplier;
        $request->request->add(['supplier_id' => $supplier->id]);
        $supplier->supplier = $request->supplier;
        $supplier->alamat = $request->alamat;
        $supplier->kontak = $request->kontak;

        $supplier->save();

        return redirect('admin/barang/supplier/index')->with('success', 'Data berhasil disimpan');
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
        $supplier = supplier::where('uuid', $id)->first();
        //dd($supplier);
        return view('admin.barang.supplier.edit', compact('supplier'));
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
        $messages = [

            'required' => ':attribute harus diisi.',
        ];
        $request->validate([

            'supplier' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
        ], $messages);

        // create new object
        $supplier = supplier::where('uuid', $id)->first();
        $supplier->supplier = $request->supplier;
        $supplier->alamat = $request->alamat;
        $supplier->kontak = $request->kontak;
        $supplier->update();

        return redirect('admin/barang/supplier/index')->with('success', 'Data berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = supplier::where('uuid', $id)->first();

        $supplier->delete();

        return redirect()->route('supplierIndex');
    }
}
