<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::orderBy('id', 'asc')->get();
        $barang = Barang::orderBy('id', 'desc')->get();

        return view('admin.barang.master.index', compact('barang', 'supplier', 'data'));
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
            'mimes' => 'photo berupa :attribute.'
        ];
        $request->validate([

            'nama_barang' => 'required',
            'satuan' => 'required',
            'departement' => 'required',
            'harga_jual' => 'required',
            'stok_tersedia' => 'required',
            'keterangan' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,gif',

        ], $messages);

        // create new object
        $barang = new barang;
        $request->request->add(['barang_id' => $barang->id]);
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->supplier_id = $request->supplier_id;
        $barang->kategori = $request->kategori;
        $barang->satuan = $request->satuan;
        $barang->departement = $request->departement;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok_tersedia = $request->stok_tersedia;
        $barang->keterangan = $request->keterangan;
        $barang->gambar = $request->gambar;
        if ($request->hasfile('gambar')) {
            $request->file('gambar')->move('images/barang/', $request->file('gambar')->getClientOriginalName());
            $barang->gambar = $request->file('gambar')->getClientOriginalName();
            $barang->save();
        } else {
            $barang->gambar = 'default.png';
        }
        $barang->save();

        return redirect('admin/barang/master/index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get barang by id
        $barang = barang::where('uuid', $id)->first();
        $supplier = Supplier::orderBy('id', 'asc')->get();

        return view('admin.barang.master.show', compact('barang', 'supplier'));
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
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([
            'nama_barang' => 'required',
            'satuan' => 'required',
            'departement' => 'required',
            'harga_jual' => 'required',
            'stok_tersedia' => 'required',
            'keterangan' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,gif',
        ], $messages);

        $barang = barang::where('uuid', $id)->first();
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->supplier_id = $request->supplier_id;
        $barang->kategori = $request->kategori;
        $barang->satuan = $request->satuan;
        $barang->departement = $request->departement;
        $barang->harga_jual = $request->harga_jual;
        $barang->diskon = $request->diskon;
        $barang->keterangan = $request->keterangan;
        $barang->stok_tersedia = $request->stok_tersedia;
        if ($request->hasfile('gambar')) {
            $request->file('gambar')->move('images/barang/', $request->file('gambar')->getClientOriginalName());
            $data = $barang->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $barang->update();

        return redirect()->route('barangIndex')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = barang::where('uuid', $id)->first();

        $barang->delete();

        return redirect()->route('barangIndex');
    }
}
