<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barang_rusak;
use Illuminate\Http\Request;

class BarangrusakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangrusak = Barang_rusak::orderBy('id', 'Desc')->get();
        $barang = Barang::orderBy('id', 'Desc')->get();

        return view('admin.barang.rusak.index', compact('barangrusak', 'barang'));
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


            'tgl_cek' => 'required',
            'kerusakan' => 'required',
            'jumlah_barang' => 'required',
        ], $messages);

        // create new object
        $barangrusak = new Barang_rusak;
        $request->request->add(['barangrusak_id' => $barangrusak->id]);
        $barangrusak->barang_id = $request->barang_id;
        $barangrusak->kerusakan = $request->kerusakan;
        $barangrusak->tgl_cek = $request->tgl_cek;
        $barangrusak->status = 1;
        $barangrusak->jumlah_barang = $request->jumlah_barang;
        $barangrusak->save();

        return redirect('admin/barang/rusak/index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BarangRusak  $barangRusak
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangRusak  $barangRusak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangrusak = Barang_rusak::orderBy('id', 'Desc')->first();
        $barang = Barang::orderBy('id', 'Desc')->get();

        return view('admin.barang.rusak.edit', compact('barangrusak', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangRusak  $barangRusak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([


            'kerusakan' => 'required',
            'tgl_cek' => 'required',
            'jumlah_barang' => 'required',
        ], $messages);

        // create new object
        $barangrusak = Barang_rusak::where('uuid', $id)->first();;
        $barangrusak->barang_id = $request->barang_id;
        $barangrusak->kerusakan = $request->kerusakan;
        $barangrusak->tgl_cek = $request->tgl_cek;
        $barangrusak->tgl_selesai = $request->tgl_selesai;
        $barangrusak->status = $request->status;
        $barangrusak->jumlah_barang = $request->jumlah_barang;
        $barangrusak->update();

        return redirect('admin/barang/rusak/index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangRusak  $barangRusak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $barangdatang = Barang_rusak::where('uuid', $id)->first();

        $barangdatang->delete();

        return redirect()->route('datangIndex');
    }
}
