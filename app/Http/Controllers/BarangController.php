<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pembeli;
use App\Supplier;
use App\Satuan;
use Carbon\Carbon;
use App\Mail\NotifDiskon;
use Illuminate\Http\Request;
use ImageResize;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Nullable;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');

        $data = Barang::orderBy('id', 'asc')->where('tgl_mulai', '<=', $now)->where('tgl_akhir', '>=', $now)->get();
        $data = $data->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            return $item;
        });

        $supplier = Supplier::orderBy('id', 'asc')->get();
        $satuan = Satuan::orderBy('id', 'asc')->get();
        $barang = Barang::orderBy('id', 'desc')->get();
        $barang = $barang->map(function ($item) use ($now) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            if (!isset($item->tgl_mulai)) {
                $item['status_diskon'] = 4;
            } elseif ($now < $item->tgl_mulai) {
                $item['status_diskon'] = 1;
            } elseif ($now > $item->tgl_akhir) {
                $item['status_diskon'] = 2;
            } elseif (Barang::wherebetween($now, ['tgl_mulai', 'tgl_akhir'])) {
                $item['status_diskon'] = 3;
            }

            return $item;
        });
        return view('admin.barang.master.index', compact('barang', 'supplier', 'data', 'satuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function email()
    {
        $pembeli = Pembeli::all();
        foreach ($pembeli as $d) {
            Mail::to($d->email)->send(new NotifDiskon($d));
        }
        return redirect()->back()->with('success', 'Berhasil! Email Terkirim!');
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
            'mimes' => 'photo berupa :attribute.',
        ];
        $request->validate([
            'nama_barang' => 'required',
            'departement' => 'required',
            'harga_jual' => 'required',
            'stok_tersedia' => 'required',
            'keterangan' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,gif',
        ], $messages);

        // create new object
        $barang = new barang;
        $request->request->add(['barang_id' => $barang->id]);
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->supplier_id = $request->supplier_id;
        $barang->satuan_id = $request->satuan_id;
        // $barang->tgl_aktif = $request->tgl_aktif;
        $barang->kategori = $request->kategori;
        $barang->departement = $request->departement;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok_tersedia = $request->stok_tersedia;
        $barang->keterangan = $request->keterangan;
        $barang->gambar = $request->gambar;
        if ($files = $request->file('gambar')) {

            // for save original image
            $ImageUpload = ImageResize::make($files);
            $originalPath = 'images/barang/';
            $ImageUpload->save($originalPath . time() . $files->getClientOriginalName());

            // for save resize image
            $thumbnailPath = 'images/resize/';
            $ImageUpload->resize(200, 200);
            $ImageUpload = $ImageUpload->save($thumbnailPath . time() . $files->getClientOriginalName());

            $barang->gambar = time() . $files->getClientOriginalName();
        } else {
            $barang->gambar = 'default.png';
        }
        $barang->save();

        return redirect('admin/barang/master/index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get barang by id
        $barang = barang::where('uuid', $id)->first();
        $supplier = Supplier::orderBy('id', 'asc')->get();
        $satuan = Satuan::orderBy('id', 'asc')->get();

        return view('admin.barang.master.show', compact('barang', 'supplier', 'satuan'));
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
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([
            'nama_barang' => 'required',
            'departement' => 'required',
            'harga_jual' => 'required',
            'stok_tersedia' => 'required',
            'keterangan' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,gif',
        ], $messages);

        $barang = barang::where('uuid', $id)->first();
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->supplier_id = $request->supplier_id;
        $barang->kategori = $request->kategori;
        $barang->satuan_id = $request->satuan_id;
        $barang->departement = $request->departement;
        $barang->harga_jual = $request->harga_jual;
        $barang->keterangan = $request->keterangan;
        $barang->stok_tersedia = $request->stok_tersedia;
        $barang->diskon = $request->diskon;
        $barang->tgl_mulai = $request->tgl_mulai;
        $barang->tgl_akhir = $request->tgl_akhir;

        if (!isset($request->diskon) && !isset($request->tgl_mulai) && !isset($request->tgl_akhir)) {
            $barang->diskon = $request->diskon;
            $barang->tgl_mulai = $request->tgl_mulai;
            $barang->tgl_akhir = $request->tgl_akhir;
        } else {
            if ($request->has('diskon') && (!isset($request->tgl_mulai)) or (!isset($request->tgl_akhir))) {
                return redirect()->back()->with('warning', 'Tanggal Diskon harus Diisi');
            } elseif ($request->has('tgl_mulai') && (!isset($request->diskon)) or (!isset($request->tgl_akhir))) {
                return redirect()->back()->with('warning', 'Diskon harus Diisi');
            } elseif ($request->has('tgl_akhir') && (!isset($request->diskon)) or (!isset($request->tgl_mulai))) {
                return redirect()->back()->with('warning', 'Diskon harus Diisi');
            } elseif ($request->tgl_mulai > $request->tgl_akhir) {
                return redirect()->back()->with('warning', 'Tanggal Harus Sesuai');
            }
        }

        if ($files = $request->file('gambar')) {

            // for save original image
            $ImageUpload = ImageResize::make($files);
            $originalPath = 'images/barang/';
            $ImageUpload->save($originalPath . time() . $files->getClientOriginalName());

            // for save resize image
            $thumbnailPath = 'images/resize/';
            $ImageUpload->resize(200, 200);
            $ImageUpload = $ImageUpload->save($thumbnailPath . time() . $files->getClientOriginalName());

            $barang->gambar = time() . $files->getClientOriginalName();
        }

        $barang->update();

        return redirect()->route('barangIndex')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id)
        $barang = barang::where('uuid', $id)->first();
        // if($barang->barang_datang->count() > 0)
        // {
        //     return back()->with('warning','Data gagal dihapus');
        // }else{


            $barang->delete();

            // return back()->with('success','Data berhasil dihapus');
        // }
    }
}
