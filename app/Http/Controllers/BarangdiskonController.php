<?php

namespace App\Http\Controllers;

use App\Barang_diskon;
use Illuminate\Http\Request;

class BarangdiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang_diskon::orderBy('id', 'Desc')->get();

        return view('admin.barang.diskon.index', compact('barang'));
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
     * @param  \App\BarangDiskon  $barangDiskon
     * @return \Illuminate\Http\Response
     */
    public function show(BarangDiskon $barangDiskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangDiskon  $barangDiskon
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangDiskon $barangDiskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangDiskon  $barangDiskon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangDiskon $barangDiskon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangDiskon  $barangDiskon
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangDiskon $barangDiskon)
    {
        //
    }
}
