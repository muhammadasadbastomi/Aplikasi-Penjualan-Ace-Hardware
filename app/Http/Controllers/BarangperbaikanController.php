<?php

namespace App\Http\Controllers;

use App\Barang_perbaikan;
use Illuminate\Http\Request;

class BarangperbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang_perbaikan::orderBy('id', 'Desc')->get();

        return view('admin.barang.perbaikan.index', compact('barang'));
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
     * @param  \App\BarangPerbaikan  $barangPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function show(BarangPerbaikan $barangPerbaikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangPerbaikan  $barangPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangPerbaikan $barangPerbaikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangPerbaikan  $barangPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangPerbaikan $barangPerbaikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangPerbaikan  $barangPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangPerbaikan $barangPerbaikan)
    {
        //
    }
}
