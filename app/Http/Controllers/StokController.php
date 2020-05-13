<?php

namespace App\Http\Controllers;

use App\Stok;
use App\Barang;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stok = Stok::orderBy('id', 'desc')->get();
        $barang = Barang::orderBy('id', 'desc')->get();

        return view('admin.barang.stokbarang.index', compact('stok', 'barang'));
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

            'barang_id' => 'unique',

        ], $messages);

        // create new object
        $stok = new stok;
        $request->request->add(['stok_id' => $stok->id]);
        $stok->barang_id = $request->barang_id;
        $stok->stok_barang = 0;


        $stok->save();

        return redirect('admin/barang/stokbarang/index')->with('success', 'Data berhasil disimpan');
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
        $stok = stok::where('uuid', $id)->first();

        $stok->delete();

        return redirect()->route('stokIndex');
    }
}
