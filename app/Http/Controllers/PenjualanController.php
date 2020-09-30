<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barang_terjual;
use App\Thumbnail;
use App\Order;
use App\Mail\NotifOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');

        $thumb = Thumbnail::where('tgl_mulai', '<=', $now)->where('tgl_akhir', '>=', $now)->orderBy('id', 'desc')->get();

        $data = Barang::orderBy('id', 'desc')->Wherenotnull('diskon')->limit(6)->where('tgl_mulai', '<=', $now)->where('tgl_akhir', '>=', $now)->get();
        $diskon = $data->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            return $item;
        });

        $barang = Barang::orderBy('id', 'desc')->get();
        $barang = $barang->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            return $item;
        });

        $termurah = Barang::orderby('harga_jual', 'desc')->get()->sortby('harga_jual');
        $termurah = $termurah->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
            return $item;
        });

        $terlaris = Barang_terjual::orderBy('jumlah_terjual', 'desc')->get()->sortbyDesc('jumlah_terjual');
        $terlaris = $terlaris->map(function ($item) {
            $diskon = ($item->barang->diskon / 100) * $item->barang->harga_jual;
            $item['harga_diskon'] = number_format($item->barang->harga_jual - $diskon, 0, ',', '.');
            $item['harga_jual'] = number_format($item->barang->harga_jual, 0, ',', '.');
            return $item;
        });

        $baranglist = Barang::orderBy('id', 'desc')->get();

        return view('home.index', compact('barang', 'diskon', 'thumb', 'termurah', 'terlaris','baranglist'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop(Request $request)
    {

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

        // $all = Barang::all();
        if ($request->search) {
            $data = Barang::where('nama_barang', 'LIKE', '%' . $request->search . '%')->paginate();
            $barang = $data->map(function ($item) {
                $diskon = ($item->diskon / 100) * $item->harga_jual;
                $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
                $item['harga_jual'] = number_format($item->harga_jual, 0, ',', '.');
                return $item;
            });
        }

        $terlaris = Barang_terjual::orderBy('jumlah_terjual', 'desc')->limit(5)->get();

        return view('home.shop', compact('barang', 'data', 'terlaris'));
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
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([
            // 'jumlah_terjual' => 'required',
            // 'tgl_terjual' => 'required',
            // 'metode' => 'required',
        ], $messages);

        // create new object
        $data = new Order;
        // $request->request->add(['barangterjual_id' => $barangterjual->id]);
        $data->barang_id = $request->barang_id;
        $data->jumlah_order = $request->jumlah_order;
        $data->nama_order = $request->nama_order;
        $data->alamat_order = $request->alamat_order;
        $data->telp_order = $request->telp_order;
        $data->email_order = $request->email_order;
        $data->tgl_order = Carbon::now()->addDays(3);
        $data->tgl_awal = Carbon::now();

        $barang = Barang::findOrFail($data->barang_id);
        $diskon = ($barang->diskon /100) * $barang->harga_jual;
        $data->harga_order = $barang->harga_jual - $diskon;

        if ($barang->diskon) {
            $data->diskon_order = $barang->diskon;
            $diskon = ($barang->diskon / 100) * $barang->harga_jual;
            $harga = $barang->harga_jual - $diskon;
            $data->total_order = $harga * $request->jumlah_order;

            $data->save();
        } else {
            $subtotal = $barang->harga_jual * $request->jumlah_order;
            $data->total_order = $subtotal;

            $data->save();
        }
        Mail::to($data->email_order)->send(new NotifOrder($data));
        return back()->with('success', 'Order Berhasil Dilakukan');
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
