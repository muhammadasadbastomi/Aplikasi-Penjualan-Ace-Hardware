<?php

namespace App\Http\Controllers;

use App\Barang_pengiriman;
use App\Barang;
use Illuminate\Http\Request;

class BarangpengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangpengiriman = Barang_pengiriman::orderBy('id', 'DESC')->get();
        $barang = Barang::orderBy('id', 'DESC')->get();

        return view('admin.barang.pengiriman.index', compact('barangpengiriman', 'barang'));
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
            'kode_pengiriman' => 'required',
            'nama_pembeli' => 'required',
            'jumlah' => 'required',
            'tgl_pengiriman' => 'required',
            'status' => 'required',
            'alamat_pengiriman' => 'required',
        ], $messages);

        // create new object
        $barangpengiriman = new Barang_pengiriman;
        $request->request->add(['barangpengiriman_id' => $barangpengiriman->id]);
        $barangpengiriman->barang_id = $request->barang_id;
        $barangpengiriman->kode_pengiriman = $request->kode_pengiriman;
        $barangpengiriman->nama_pembeli = $request->nama_pembeli;
        $barangpengiriman->tgl_pengiriman = $request->tgl_pengiriman;
        $barangpengiriman->alamat_pengiriman = $request->alamat_pengiriman;
        $barangpengiriman->status = $request->status;
        $barangpengiriman->jumlah = $request->jumlah;
        $barangpengiriman->save();

        return redirect('admin/barang/pengiriman/index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang_pengiriman  $barang_pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_pengiriman $barang_pengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang_pengiriman  $barang_pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangpengiriman = Barang_pengiriman::orderBy('id', 'Desc')->first();
        $barang = Barang::orderBy('id', 'Desc')->get();

        return view('admin.barang.pengiriman.edit', compact('barangpengiriman', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang_pengiriman  $barang_pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([], $messages);

        // update
        $barangpengiriman = Barang_pengiriman::where('uuid', $id)->first();
        $barangpengiriman->barang_id = $request->barang_id;
        $barangpengiriman->kode_pengiriman = $request->kode_pengiriman;
        $barangpengiriman->nama_pembeli = $request->nama_pembeli;
        $barangpengiriman->tgl_pengiriman = $request->tgl_pengiriman;
        $barangpengiriman->alamat_pengiriman = $request->alamat_pengiriman;
        $barangpengiriman->status = $request->status;
        $barangpengiriman->jumlah = $request->jumlah;
        $barangpengiriman->update();

        return redirect('admin/barang/pengiriman/index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang_pengiriman  $barang_pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangpengiriman = Barang_pengiriman::where('uuid', $id)->first();

        $barangpengiriman->delete();

        return redirect()->route('pengirimanIndex');
    }
}
