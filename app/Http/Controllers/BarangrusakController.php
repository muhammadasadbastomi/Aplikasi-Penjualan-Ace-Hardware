<?php

namespace App\Http\Controllers;

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
        $barang = Barang_rusak::orderBy('id', 'Desc')->get();

        return view('admin.barang.rusak.index', compact('barang'));
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
     * @param  \App\BarangRusak  $barangRusak
     * @return \Illuminate\Http\Response
     */
    public function show(BarangRusak $barangRusak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangRusak  $barangRusak
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangRusak $barangRusak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangRusak  $barangRusak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangRusak $barangRusak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangRusak  $barangRusak
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangRusak $barangRusak)
    {
        //
    }
}
