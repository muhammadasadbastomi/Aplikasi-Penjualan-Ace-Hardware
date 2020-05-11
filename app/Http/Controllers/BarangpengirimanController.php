<?php

namespace App\Http\Controllers;

use App\Barang_pengiriman;
use Illuminate\Http\Request;

class BarangpengirimanController extends Controller
{
    /**
     * Display a listing of the resource..
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
    public function edit(Barang_pengiriman $barang_pengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang_pengiriman  $barang_pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang_pengiriman $barang_pengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang_pengiriman  $barang_pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang_pengiriman $barang_pengiriman)
    {
        //
    }
}
