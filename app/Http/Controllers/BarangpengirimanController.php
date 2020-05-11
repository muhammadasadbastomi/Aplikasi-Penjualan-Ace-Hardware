<?php

namespace App\Http\Controllers;

use App\Barang_pengiriman;
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
        $barang = Barang_pengiriman::orderBy('id', 'Desc')->get();

        return view('admin.barang.pengiriman.index', compact('barang'));
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
     * @param  \App\BarangPengiriman  $barangPengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(BarangPengiriman $barangPengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangPengiriman  $barangPengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangPengiriman $barangPengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangPengiriman  $barangPengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangPengiriman $barangPengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangPengiriman  $barangPengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangPengiriman $barangPengiriman)
    {
        //
    }
}
