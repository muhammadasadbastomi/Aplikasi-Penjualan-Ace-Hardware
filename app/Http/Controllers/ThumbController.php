<?php

namespace App\Http\Controllers;

use App\Thumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThumbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');

        $thumbnail = Thumbnail::orderBy('id', 'desc')->get();
        $data = $thumbnail->map(function ($item) use ($now) {
            if ($now < $item->tgl_mulai) {
                $item['status_diskon'] = 1;
            } elseif ($now > $item->tgl_akhir) {
                $item['status_diskon'] = 2;
            } elseif (Thumbnail::wherebetween($now, ['tgl_mulai', 'tgl_akhir'])) {
                $item['status_diskon'] = 3;
            }
            return $item;
        });

        $data1 = Thumbnail::orderBy('id', 'desc')->first();
        return view('/admin/thumbnail/index', compact('data', 'data1'));
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
            'mimes' => 'photo harus berupa :attribute.',
        ];
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,gif',
        ], $messages);

        if ($request->tgl_mulai >= $request->tgl_akhir) {
            return redirect()->back()->with('warning', 'Tanggal harus sesuai');
        }
        // create new object
        $data = new Thumbnail;
        $data->judul = $request->judul;
        $data->keterangan = $request->keterangan;
        $data->tgl_mulai = $request->tgl_mulai;
        $data->tgl_akhir = $request->tgl_akhir;
        $data->gambar = $request->gambar;
        if ($request->hasfile('gambar')) {
            $request->file('gambar')->move('images/thumbnail/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        } else {
            $data->gambar = 'default.png';
        }
        $data->save();

        return redirect('admin/thumbnail/index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function show(Thumbnail $thumbnail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function edit(Thumbnail $thumbnail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
        ], $messages);

        if ($request->tgl_mulai >= $request->tgl_akhir) {
            return redirect()->back()->with('warning', 'Tanggal harus sesuai');
        }

        $data = Thumbnail::findOrFail($request->id);
        $data->judul = $request->judul;
        $data->keterangan = $request->keterangan;
        $data->tgl_mulai = $request->tgl_mulai;
        $data->tgl_akhir = $request->tgl_akhir;
        if ($request->pict != '') {
            $path = public_path() . '/images/thumbnail/';

            //code for remove old pict
            if ($data->gambar != '' && $data->gambar != null) {
                $file_old = $path . $data->gambar;
                unlink($file_old);
            }
            if (!$request->pict) {
                $pict = $data->gambar;
            } else {
                //upload new pict
                $pict = $request->pict;
                $filename = $pict->getClientOriginalName();
                $pict->move($path, $filename);
            }

            //for update in table
            $data->update(['gambar' => $filename]);
        }
        $data->update();
        // dd($data);
        return back()->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Thumbnail::where('uuid', $id)->first();

        $data->delete();

        return redirect()->route('thumbIndex');
    }
}
