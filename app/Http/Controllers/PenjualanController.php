<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barang_terjual;
use App\Thumbnail;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;
use PhpParser\Node\Stmt\Return_;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $thumb = Thumbnail::orderBy('id', 'DESC')->get();
        $data = Barang::orderBy('id', 'desc')->Wherenotnull('diskon')->limit(6)->get();
        $diskon = $data->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            return $item;
        });

        $barang = Barang::orderBy('id', 'desc')->paginate(9);
        $barang = $barang->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            return $item;
        });


        $termurah = Barang::orderBy('harga_jual', 'asc')->paginate(9);
        $termurah = $termurah->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            return $item;
        });

        $terlaris = Barang_terjual::orderBy('jumlah_terjual', 'DESC')->paginate(9);
        $terlaris = $terlaris->map(function ($item) {
            $diskon = ($item->barang->diskon / 100) * $item->barang->harga_jual;
            $item['harga_diskon'] = number_format($item->barang->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->barang->harga_jual, 0, ',', '.');
            return $item;
        });

        return view('home.index', compact('barang', 'diskon', 'thumb', 'termurah', 'terlaris'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop(Request $request)
    {
        if ($request->has('search')) {
            $data = Barang::where('nama_barang', 'LIKE', '%' . $request->search . '%')->paginate(100);
            $barang = $data->map(function ($item) {
                $diskon = ($item->diskon / 100) * $item->harga_jual;
                $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
                $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
                return $item;
            });
        } else {
            $data = Barang::orderBy('id', 'desc')->paginate(9);
            $barang = $data->map(function ($item) {
                $diskon = ($item->diskon / 100) * $item->harga_jual;
                $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
                $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
                return $item;
            });
        }

        // Filter Controller
        if ($request->harga or $request->kategori) {

            if ($request->harga == 0) {
                $data = Barang::where('kategori', $request->kategori)->paginate(100);
            } elseif ($request->harga == 10000 && $request->kategori == 0) {
                $data = Barang::whereBetween('harga_jual', [0, $request->harga])->paginate(100);
            } elseif ($request->harga == 100000 && $request->kategori == 0) {
                $data = Barang::whereBetween('harga_jual', [10000, $request->harga])->paginate(100);
            } elseif ($request->harga == 500000 && $request->kategori == 0) {
                $data = Barang::whereBetween('harga_jual', [50000, $request->harga])->paginate(100);
            } elseif ($request->harga == 499999 && $request->kategori == 0) {
                $data = Barang::where('harga_jual', '>', 499999)->orderBy('id', 'DESC')->paginate(100);
            } elseif ($request->harga == 10000) {
                $data = Barang::whereBetween('harga_jual', [0, $request->harga])->where('kategori', $request->kategori)->paginate(100);
            } elseif ($request->harga == 100000) {
                $data = Barang::whereBetween('harga_jual', [10000, $request->harga])->where('kategori', $request->kategori)->paginate(100);
            } elseif ($request->harga == 500000) {
                $data = Barang::whereBetween('harga_jual', [100000, $request->harga])->where('kategori', $request->kategori)->paginate(100);
            } elseif ($request->harga == 499999) {
                $data = Barang::where('harga_jual', '>', 499999)->where('kategori', $request->kategori)->paginate(100);
            }
            $barang = $data->map(function ($item) {
                $diskon = ($item->diskon / 100) * $item->harga_jual;
                $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
                $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
                return $item;
            });
        } else {
            $data = Barang::orderBy('id', 'desc')->paginate(9);
            $barang = $data->map(function ($item) {
                $diskon = ($item->diskon / 100) * $item->harga_jual;
                $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
                $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
                return $item;
            });
        }
        // End Filter


        $all = Barang::all();

        $terlaris = Barang_terjual::orderBy('jumlah_terjual', 'desc')->limit(5)->get();

        return view('home.shop', compact('barang', 'data', 'terlaris', 'all'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::where('uuid', $id)->first();


        $diskon = ($barang->diskon / 100) * $barang->harga_jual;
        $barang['harga_diskon'] = number_format($barang->harga_jual - $diskon, 0, ',', '.');
        $barang['harga_jual'] = number_format($barang->harga_jual, 0, ',', '.');

        $terkait = Barang::where('nama_barang', 'like', $barang->nama_barang)->orWhere('kategori', $barang->kategori)->get();
        $terkait = $terkait->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            return $item;
        });

        return view('home.detail', compact('barang', 'terkait'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
