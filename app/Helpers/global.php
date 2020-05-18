<?php

use App\Thumbnail;
use App\Supplier;
use App\Barang;
use App\User;
use App\Barang_datang;
use App\Barang_garansi;
use App\Barang_terjual;
use App\Barang_rusak;
use App\Barang_pengiriman;

function totalThumb()
{
    return Thumbnail::count();
}

function totalsupplier()
{
    return Supplier::count();
}

function totalbarang()
{
    return Barang::count();
}

function totaluser()
{
    return user::where('role', '2')->count();
}

function totaldatang()
{
    return Barang_datang::count();
}

function totalterjual()
{
    return Barang_terjual::count();
}

function totalgaransi()
{
    return Barang_garansi::count();
}

function totalrusak()
{
    return Barang_rusak::count();
}

function totalpengiriman()
{
    return Barang_pengiriman::count();
}

function totaldiskon()
{
    $data1 = Barang::where('diskon', null)->count();
    $data2 = Barang::orderBy('id', 'DESC')->count();
    $data = $data2 - $data1;
    return $data;
}

function totalperbaikan()
{
    return Barang_rusak::where('status', '2')->count();
}

function totalselesai()
{
    return Barang_rusak::where('status', '3')->count();
}
