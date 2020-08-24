<?php

namespace App\Http\Controllers;

use App\Barang_pengiriman;
use App\Barang_terjual;
use App\Barang;
use App\Mail\NotifPengirimanBarang;
use App\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $barang = Barang_terjual::where('metode', '1')->get();
        $pembeli = Pembeli::orderBy('id', 'DESC')->get();

        return view('admin.barang.pengiriman.index', compact('barangpengiriman', 'barang', 'pembeli'));
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

    public function status(Request $request)
    {
        $data = Barang_pengiriman::findOrfail($request->id);
        $data->status = $request->status;
        $data->update();

        Mail::to($data->pembeli->email)->send(new NotifPengirimanBarang($data));
        return redirect()->back()->with('success', 'Data Berhasil Diubah, <br> Terkirim ke ' . $data->pembeli->nama_pembeli . '');
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
            'tgl_pengiriman' => 'required',
            'status' => 'required',
        ], $messages);

        // create new object
        $barangpengiriman = new Barang_pengiriman;
        $request->request->add(['barangpengiriman_id' => $barangpengiriman->id]);
        $barangpengiriman->terjual_id = $request->terjual_id;
        $barangpengiriman->kode_pengiriman = $request->kode_pengiriman;
        $barangpengiriman->pembeli_id = $request->pembeli_id;
        $barangpengiriman->tgl_pengiriman = $request->tgl_pengiriman;
        $barangpengiriman->status = $request->status;

        $terjual = Barang_terjual::findOrFail($barangpengiriman->terjual_id);
        $barangpengiriman->jumlah = $terjual->jumlah_terjual;
        $barangpengiriman->save();

        $terjual->metode = 2;
        $terjual->update();

        Mail::to($barangpengiriman->pembeli->email)->send(new NotifPengirimanBarang($barangpengiriman));
        return redirect('admin/barang/pengiriman/index')->with('success', 'Data Berhasil Disimpan, <br> Terkirim ke ' . $barangpengiriman->pembeli->nama_pembeli . '');
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
        $barang = Barang_pengiriman::orderBy('id', 'Desc')->get();
        $pembeli = Pembeli::orderBy('id', 'DESC')->get();

        return view('admin.barang.pengiriman.edit', compact('barangpengiriman', 'barang', 'pembeli'));
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
        $barangpengiriman->pembeli_id = $request->pembeli_id;
        $barangpengiriman->tgl_pengiriman = $request->tgl_pengiriman;
        $barangpengiriman->update();

        $pembeli = Pembeli::findOrfail($barangpengiriman->pembeli_id);
        $pembeli->alamat = $request->alamat;
        $pembeli->update();


        Mail::to($barangpengiriman->pembeli->email)->send(new NotifPengirimanBarang($barangpengiriman));
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

        $terjual = Barang_terjual::findOrFail($barangpengiriman->terjual_id);
        $terjual->metode = 1;
        $terjual->update();

        return redirect()->route('pengirimanIndex');
    }
}
