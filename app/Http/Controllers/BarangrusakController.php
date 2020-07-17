<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barang_rusak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([
            'kerusakan' => 'required',
            'jumlah_barang' => 'required',
        ], $messages);


        $validator = Validator::make($request->all(), [
            'barang_id' => 'required|unique:barang_rusaks|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        // create new object
        $barangrusak = new Barang_rusak;
        $request->request->add(['barangrusak_id' => $barangrusak->id]);
        $barangrusak->barang_id = $request->barang_id;
        $barangrusak->kerusakan = $request->kerusakan;
        $barangrusak->tgl_cek = $request->tgl_cek;
        $barangrusak->status = 1;
        $barangrusak->jumlah_barang = $request->jumlah_barang;

        $barang = Barang::findOrFail($barangrusak->barang_id);

        if ($request->jumlah_barang > $barang->stok_tersedia) {
            return redirect()->back()->with('warning', 'Jumlah Barang Melebihi Stok');
        } else {
            $barang->stok_tersedia = $barang->stok_tersedia - $request->jumlah_barang;
            $barang->update();
        }

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
        $barangrusak = Barang_rusak::where('uuid', $id)->first();
        // $barangrusak->barang_id = $request->barang_id;
        $barangrusak->kerusakan = $request->kerusakan;
        $barangrusak->tgl_cek = $request->tgl_cek;
        $barangrusak->tgl_selesai = $request->tgl_selesai;
        $barangrusak->jumlah_barang = $request->jumlah_barang;
        if ($barangrusak->status != 3) {
            // dd($barangrusak->barang_id);
            if ($request->status == 3) {


                $barang = Barang::findOrFail($barangrusak->barang_id);
                $barang->stok_tersedia = $request->jumlah_barang + $barang->stok_tersedia;
                $barang->update();
            }
        }
        $barangrusak->status = $request->status;

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

        $barangrusak = Barang_rusak::where('uuid', $id)->first();

        $barangrusak->delete();

        return redirect()->route('rusakIndex');
    }
}
