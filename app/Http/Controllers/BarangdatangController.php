<?php

namespace App\Http\Controllers;

use App\Barang_datang;
use Illuminate\Http\Request;

class BarangdatangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang_datang::orderBy('id', 'Desc')->get();

        return view('admin.barang.datang.index', compact('barang'));
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
     * @param  \App\BarangDatang  $barangDatang
     * @return \Illuminate\Http\Response
     */
    public function show(BarangDatang $barangDatang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangDatang  $barangDatang
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangDatang $barangDatang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangDatang  $barangDatang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangDatang $barangDatang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangDatang  $barangDatang
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangDatang $barangDatang)
    {
        //
    }
}
