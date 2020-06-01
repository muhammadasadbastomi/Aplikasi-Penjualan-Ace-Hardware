<?php

namespace App\Http\Controllers;

use App\Barang;
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

        $terlaris = Barang::orderBy('id', 'asc')->paginate(9);
        $terlaris = $terlaris->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
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
            $data = Barang::where('nama_barang', 'LIKE', '%' . $request->search . '%')->paginate(9);
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

        $all = Barang::all();

        $terlaris = Barang::orderBy('id', 'asc')->paginate(5);
        $terlaris = $terlaris->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            return $item;
        });

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




        $terkait = Barang::where('kategori', $barang->kategori)->get();
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
