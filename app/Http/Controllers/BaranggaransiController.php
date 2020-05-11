<?php

namespace App\Http\Controllers;

use App\Barang_garansi;
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
        $barang = Barang_garansi::orderBy('id', 'Desc')->get();

        return view('admin.barang.garansi.index', compact('barang'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BarangGaransi  $barangGaransi
     * @return \Illuminate\Http\Response
     */
    public function show(BarangGaransi $barangGaransi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangGaransi  $barangGaransi
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangGaransi $barangGaransi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangGaransi  $barangGaransi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangGaransi $barangGaransi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangGaransi  $barangGaransi
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangGaransi $barangGaransi)
    {
        //
    }
}
