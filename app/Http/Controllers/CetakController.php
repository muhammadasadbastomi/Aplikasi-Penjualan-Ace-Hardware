<?php

namespace App\Http\Controllers;

use PDF;
use App\Barang;
use App\Barang_datang;
use App\Barang_garansi;
use App\Barang_pengiriman;
use App\Barang_rusak;
use App\Barang_terjual;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function barang()
    {
        $data = Barang::all();

        $pdf = PDF::loadview('laporan/barang', compact('data'));
        return $pdf->stream('laporan-barang-pdf');
    }

    public function datang()
    {
        $data = Barang_datang::all();

        $pdf = PDF::loadview('laporan/datang', compact('data'));
        return $pdf->stream('laporan-barang-datang-pdf');
    }

    public function diskon()
    {
        $data = Barang::all();

        $data = $data->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            return $item;
        });

        $pdf = PDF::loadview('laporan/diskon', compact('data'));
        return $pdf->stream('laporan-barang-diskon-pdf');
    }

    public function pengiriman()
    {
        $data = Barang_pengiriman::all();

        $pdf = PDF::loadview('laporan/pengiriman', compact('data'));
        return $pdf->stream('laporan-barang-pengiriman-pdf');
    }

    public function terkirim()
    {
        $data = Barang_pengiriman::all();

        $pdf = PDF::loadview('laporan/terkirim', compact('data'));
        return $pdf->stream('laporan-barang-terkirim-pdf');
    }

    public function terjual()
    {
        $data = Barang_terjual::all();

        $pdf = PDF::loadview('laporan/terjual', compact('data'));
        return $pdf->stream('laporan-barang-terjual-pdf');
    }

    public function garansi()
    {
        $data = Barang_garansi::all();

        $pdf = PDF::loadview('laporan/garansi', compact('data'));
        return $pdf->stream('laporan-barang-garansi-pdf');
    }

    public function rusak()
    {
        $data = Barang_rusak::all();

        $pdf = PDF::loadview('laporan/rusak', compact('data'));
        return $pdf->stream('laporan-barang-rusak-pdf');
    }

    public function perbaikan1()
    {
        $data = Barang_rusak::all();

        $pdf = PDF::loadview('laporan/perbaikan1', compact('data'));
        return $pdf->stream('laporan-barang-perbaikan-pdf');
    }

    public function perbaikan2()
    {
        $data = Barang_rusak::all();

        $pdf = PDF::loadview('laporan/perbaikan2', compact('data'));
        return $pdf->stream('laporan-barang-perbaikan-pdf');
    }
}
