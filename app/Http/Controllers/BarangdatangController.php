<?php

namespace App\Http\Controllers;

use App\Barang_datang;
use App\Barang;
use App\Stok;
use Illuminate\Http\Request;

class BarangdatangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::orderBy('id', 'Desc')->get();
        $barangdatang = Barang_datang::orderBy('id', 'Desc')->get();

        return view('admin.barang.datang.index', compact('barangdatang', 'barang'));
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


            'tgl_masuk' => 'required',
            'jumlah' => 'required',
        ], $messages);

        // create new object
        $barangdatang = new Barang_datang;
        $request->request->add(['barangdatang_id' => $barangdatang->id]);
        $barangdatang->id_barang = $request->barang_id;
        $barangdatang->tgl_masuk = $request->tgl_masuk;
        $barangdatang->jumlah = $request->jumlah;
        $barangdatang->save();

        return redirect('admin/barang/datang/index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BarangDatang  $barangDatang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_Datang $barangDatang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangDatang  $barangDatang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangdatang = Barang_datang::where('uuid', $id)->first();
        $barang = Barang::orderBy('id', 'asc')->get();

        return view('admin.barang.datang.edit', compact('barangdatang', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangDatang  $barangDatang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([


            'tgl_masuk' => 'required',
            'jumlah' => 'required',
        ], $messages);

        $barangdatang = Barang_datang::where('uuid', $id)->first();
        $barangdatang->id_barang = $request->id_barang;
        $barangdatang->tgl_masuk = $request->tgl_masuk;
        $barangdatang->jumlah = $request->jumlah;
        //dd($barangdatang);
        $barangdatang->update();

        return redirect()->route('datangIndex')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangDatang  $barangDatang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $barang_datang = barang_datang::where('uuid', $id)->first();

        $barang_datang->delete();

        return redirect()->route('datangIndex');
    }
}
