<?php

namespace App\Http\Controllers;

use App\Barang_garansi;
use App\Barang;
use Illuminate\Http\Request;

class BaranggaransiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baranggaransi = Barang_garansi::orderBy('id', 'Desc')->get();
        $barang = Barang::orderBy('id', 'Desc')->get();

        return view('admin.barang.garansi.index', compact('barang', 'baranggaransi'));
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
            'nama_pembeli' => 'required',
            'tgl_pembelian' => 'required',
            'tgl_akhir_garansi' => 'required',
            'jumlah' => 'required',
        ], $messages);

        // create new object
        $baranggaransi = new Barang_garansi;
        $request->request->add(['baranggaransi_id' => $baranggaransi->id]);
        $baranggaransi->barang_id = $request->barang_id;
        $baranggaransi->nama_pembeli = $request->nama_pembeli;
        $baranggaransi->tgl_pembelian = $request->tgl_pembelian;
        $baranggaransi->tgl_akhir_garansi = $request->tgl_akhir_garansi;
        $baranggaransi->jumlah = $request->jumlah;
        $baranggaransi->save();

        return redirect('admin/barang/garansi/index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BarangGaransi  $barangGaransi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangGaransi  $barangGaransi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baranggaransi = Barang_garansi::orderBy('id', 'Desc')->first();
        $barang = Barang::orderBy('id', 'Desc')->get();

        return view('admin.barang.garansi.edit', compact('baranggaransi', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangGaransi  $barangGaransi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([
            'nama_pembeli' => 'required',
            'tgl_pembelian' => 'required',
            'tgl_akhir_garansi' => 'required',
            'jumlah' => 'required',
        ], $messages);

        // create new object
        $baranggaransi = Barang_garansi::where('uuid', $id)->first();
        $baranggaransi->barang_id = $request->barang_id;
        $baranggaransi->nama_pembeli = $request->nama_pembeli;
        $baranggaransi->tgl_pembelian = $request->tgl_pembelian;
        $baranggaransi->tgl_akhir_garansi = $request->tgl_akhir_garansi;
        $baranggaransi->jumlah = $request->jumlah;
        $baranggaransi->update();

        return redirect('admin/barang/garansi/index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangGaransi  $barangGaransi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baranggaransi = Barang_garansi::where('uuid', $id)->first();

        $baranggaransi->delete();

        return redirect()->route('garansiIndex');
    }
}
