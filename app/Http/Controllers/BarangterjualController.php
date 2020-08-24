<?php

namespace App\Http\Controllers;


use App\Barang_Terjual;
use App\Barang;
use Illuminate\Http\Request;

class BarangterjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangterjual = Barang_terjual::orderBy('id', 'Desc')->get();
        $barang = Barang::orderBy('id', 'Desc')->get();

        return view('admin.barang.terjual.index', compact('barangterjual', 'barang'));
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
            'jumlah_terjual' => 'required',
            'tgl_terjual' => 'required',
            'metode' => 'required',
        ], $messages);

        // create new object
        $barangterjual = new Barang_terjual;
        $request->request->add(['barangterjual_id' => $barangterjual->id]);
        $barangterjual->barang_id = $request->barang_id;
        $barangterjual->jumlah_terjual = $request->jumlah_terjual;
        $barangterjual->tgl_terjual = $request->tgl_terjual;
        $barangterjual->metode = $request->metode;

        $barang = Barang::findOrFail($barangterjual->barang_id);
        $barangterjual->harga_terjual = $barang->harga_jual;

        if ($barang->diskon) {
            $barangterjual->diskon_terjual = $barang->diskon;
            $diskon = ($barang->diskon / 100) * $barang->harga_jual;
            $harga = $barang->harga_jual - $diskon;
            $barangterjual->total_terjual = $harga * $request->jumlah_terjual;

            $barangterjual->save();
        } else {
            $subtotal = $barang->harga_jual * $request->jumlah_terjual;
            $barangterjual->total_terjual = $subtotal;

            $barangterjual->save();
        }

        // update stok
        $barang->stok_tersedia = $barang->stok_tersedia - $request->jumlah_terjual;
        if ($barang->stok_tersedia < 0) {
            $delete = Barang_terjual::findOrfail($barangterjual->id)->delete();
            return back()->with('warning', 'Stok tidak mencukupi');
        }
        $barang->update();

        return redirect('admin/barang/terjual/index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BarangTerjual  $barangTerjual
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_Terjual $barangTerjual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangTerjual  $barangTerjual
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangterjual = Barang_terjual::orderBy('id', 'Desc')->first();
        $barang = Barang::orderBy('id', 'Desc')->get();

        return view('admin.barang.terjual.edit', compact('barangterjual', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangTerjual  $barangTerjual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([
            'tgl_terjual' => 'required',
            'jumlah_terjual' => 'required',

        ], $messages);

        // update
        $barangterjual = Barang_terjual::where('uuid', $id)->first();
        $barangterjual->barang_id = $request->barang_id;
        $barangterjual->jumlah_terjual = $request->jumlah_terjual;
        $barangterjual->tgl_terjual = $request->tgl_terjual;
        $barangterjual->update();

        return redirect('admin/barang/terjual/index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangTerjual  $barangTerjual
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangterjual = Barang_terjual::where('uuid', $id)->first();
        $stok = $barangterjual->jumlah_terjual;
        $barangterjual->delete();

        //update stok
        $barang = Barang::findOrFail($barangterjual->barang_id);
        $barang->stok_tersedia = $barang->stok_tersedia + $stok;
        $barang->update();

        return redirect()->route('terjualIndex');
    }
}
