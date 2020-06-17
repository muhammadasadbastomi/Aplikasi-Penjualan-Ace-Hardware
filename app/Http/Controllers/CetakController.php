<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use PDF;
use App\Barang;
use App\Barang_datang;
use App\Barang_garansi;
use App\Barang_pengiriman;
use App\Barang_rusak;
use App\Barang_terjual;
use App\Supplier;
use App\Pembeli;
use App\Thumbnail;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function pembeli()
    {
        $data = Pembeli::all();

        $pdf = PDF::loadview('laporan/pembeli', compact('data'));
        return $pdf->stream('laporan-pembeli-pdf');
    }

    public function supplier()
    {
        $data = Supplier::all();

        $pdf = PDF::loadview('laporan/supplier', compact('data'));
        return $pdf->stream('laporan-supplier-pdf');
    }

    public function barang()
    {
        $data = Barang::all();

        $pdf = PDF::loadview('laporan/barang', compact('data'));
        return $pdf->stream('laporan-barang-pdf');
    }

    public function barangsupplier(Request $request)
    {
        $barangsupplier = $request->barangsupplier;

        $supplier = supplier::where('id', '=', $barangsupplier)->first();

        $data = Barang::where('supplier_id', '=', $barangsupplier)->get();

        $pdf = PDF::loadview('laporan/barangsupplier', compact('data', 'barangsupplier', 'supplier'));
        return $pdf->stream('laporan-barang-supplier-pdf');
    }

    public function datang()
    {
        $data = Barang_datang::all();
        $total = Barang_datang::sum('total');

        $pdf = PDF::loadview('laporan/datang', compact('data', 'total'));
        return $pdf->stream('laporan-barang-datang-pdf');
    }

    public function datangtgl(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $now = Carbon::now()->format('Y-m-d');

        $data = Barang_datang::whereBetween('tgl_masuk', [$start, $end])->get();
        $total = Barang_datang::whereBetween('tgl_masuk', [$start, $end])->sum('total');

        $pdf = PDF::loadview('laporan/datangtgl', compact('data', 'total', 'end', 'start', 'now'));
        return $pdf->stream('laporan-barang-datang-tanggal-pdf');
    }

    public function diskon()
    {
        $now = Carbon::now()->format('Y-m-d');

        $data = Barang::where('diskon', '!=', null)->get();

        $data = $data->map(function ($item) use ($now) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            if ($item->tgl_aktif >= $now) {
                $item['status_diskon'] = 1;
            } else {
                $item['status_diskon'] = 2;
            }
            return $item;
        });

        $pdf = PDF::loadview('laporan/diskon', compact('data'));
        return $pdf->stream('laporan-barang-diskon-pdf');
    }

    public function diskonbulan()
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
        $end = Carbon::now()->endOfMonth()->toDateString();
        $now = Carbon::now()->translatedFormat('F Y');
        $noww = Carbon::now();

        $data = Barang::where('tgl_aktif', '>=', $noww)->whereBetween('tgl_aktif', [$start, $end])->get();

        $data = $data->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');

            $item['status_diskon'] = 1;

            return $item;
        });

        $pdf = PDF::loadview('laporan/diskonbulan', compact('data', 'now'));
        return $pdf->stream('laporan-barang-diskon-bulan-pdf');
    }

    public function angkadiskon(Request $request)
    {
        $now = Carbon::now()->format('Y-m-d');

        $diskon = $request->diskon;

        $data = Barang::where('diskon', '=', $diskon)->get();

        $data = $data->map(function ($item) use ($now) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            if ($item->tgl_aktif >= $now) {
                $item['status_diskon'] = 1;
            } else {
                $item['status_diskon'] = 2;
            }
            return $item;
        });

        $pdf = PDF::loadview('laporan/angkadiskon', compact('data', 'diskon'));
        return $pdf->stream('laporan-barang-angka-diskon-pdf');
    }

    public function pengiriman()
    {
        $data = Barang_pengiriman::all();

        $pdf = PDF::loadview('laporan/pengiriman', compact('data'));
        return $pdf->stream('laporan-barang-pengiriman-pdf');
    }

    public function pengirimantgl(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $now = Carbon::now()->format('Y-m-d');

        $data = Barang_pengiriman::whereBetween('tgl_pengiriman', [$start, $end])->get();

        $pdf = PDF::loadview('laporan/pengirimantgl', compact('data', 'start', 'end', 'now'));
        return $pdf->stream('laporan-barang-pengiriman-tanggal-pdf');
    }

    public function terkirim()
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
        $end = Carbon::now()->endOfMonth()->toDateString();
        $now = Carbon::now()->translatedFormat('F Y');
        $data = Barang_pengiriman::where('status', '=', 3)->whereBetween('tgl_pengiriman', [$start, $end])->get();

        $pdf = PDF::loadview('laporan/terkirim', compact('data', 'now'));
        return $pdf->stream('laporan-barang-terkirim-pdf');
    }

    public function terjual()
    {
        $data = Barang_terjual::all();
        $total = Barang_terjual::sum('total_terjual');

        $pdf = PDF::loadview('laporan/terjual', compact('data', 'total'));
        return $pdf->stream('laporan-barang-terjual-pdf');
    }

    public function terjualtgl(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $now = Carbon::now()->format('Y-m-d');

        $data = Barang_terjual::whereBetween('tgl_terjual', [$start, $end])->get();
        $total = Barang_terjual::whereBetween('tgl_terjual', [$start, $end])->sum('total_terjual');

        $pdf = PDF::loadview('laporan/terjualtgl', compact('data', 'total', 'end', 'start', 'now'));
        return $pdf->stream('laporan-barang-terjual-tanggal-pdf');
    }

    public function garansi()
    {
        $data = Barang_garansi::all();

        $pdf = PDF::loadview('laporan/garansi', compact('data'));
        return $pdf->stream('laporan-barang-garansi-pdf');
    }

    public function garansitglakhir(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $now = Carbon::now()->format('Y-m-d');

        $data = Barang_garansi::whereBetween('tgl_akhir_garansi', [$start, $end])->get();

        $pdf = PDF::loadview('laporan/garansitanggal', compact('data', 'end', 'start', 'now'));
        return $pdf->stream('laporan-barang-garansi-tanggal-akhir-pdf');
    }

    public function rusak()
    {
        $data = Barang_rusak::all();

        $pdf = PDF::loadview('laporan/rusak', compact('data'));
        return $pdf->stream('laporan-barang-rusak-pdf');
    }

    public function perbaikan1()
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
        $end = Carbon::now()->endOfMonth()->toDateString();
        $now = Carbon::now()->translatedFormat('F Y');

        $data = Barang_rusak::where('status', '=', 3)->whereBetween('tgl_selesai', [$start, $end])->get();


        $pdf = PDF::loadview('laporan/perbaikan1', compact('data', 'now'));
        return $pdf->stream('laporan-barang-perbaikan-pdf');
    }

    public function perbaikan2()
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
        $end = Carbon::now()->endOfMonth()->toDateString();
        $now = Carbon::now()->translatedFormat('F Y');

        $data = Barang_rusak::where('status', '=', 4)->whereBetween('updated_at', [$start, $end])->get();


        $pdf = PDF::loadview('laporan/perbaikan2', compact('data', 'now'));
        return $pdf->stream('laporan-barang-perbaikan-pdf');
    }
    public function perbaikan3()
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
        $end = Carbon::now()->endOfMonth()->toDateString();
        $now = Carbon::now()->translatedFormat('F Y');

        $data = Barang_rusak::where('status', '=', 1)->whereBetween('created_at', [$start, $end])->get();


        $pdf = PDF::loadview('laporan/perbaikan4', compact('data', 'now'));
        return $pdf->stream('laporan-barang-perbaikan-pdf');
    }

    public function perbaikan4()
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
        $end = Carbon::now()->endOfMonth()->toDateString();
        $now = Carbon::now()->translatedFormat('F Y');

        $data = Barang_rusak::where('status', '=', 2)->whereBetween('updated_at', [$start, $end])->get();


        $pdf = PDF::loadview('laporan/perbaikan3', compact('data', 'now'));
        return $pdf->stream('laporan-barang-perbaikan-pdf');
    }

    public function etalase()
    {
        $now = Carbon::now();

        $data = Thumbnail::all();
        $data = $data->map(function ($item) use ($now) {
            if ($item->tgl_aktif >= $now) {
                $item['status_diskon'] = 1;
            } else {
                $item['status_diskon'] = 2;
            }
            return $item;
        });

        $pdf = PDF::loadview('laporan/etalase', compact('data', 'now'));
        return $pdf->stream('laporan-etalase-pdf');
    }

    public function etalasebulan()
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
        $end = Carbon::now()->endOfMonth()->toDateString();
        $noww = Carbon::now();
        $now = Carbon::now()->translatedFormat('F Y');

        $data = Thumbnail::where('tgl_aktif', '>=', $noww)->whereBetween('updated_at', [$start, $end])->get();
        $data = $data->map(function ($item) use ($noww) {
            if ($item->tgl_aktif >= $noww) {
                $item['status_diskon'] = 1;
            } else {
                $item['status_diskon'] = 2;
            }
            return $item;
        });

        $pdf = PDF::loadview('laporan/etalasebulan', compact('data', 'now'));
        return $pdf->stream('laporan-etalase-bulan-pdf');
    }
}
