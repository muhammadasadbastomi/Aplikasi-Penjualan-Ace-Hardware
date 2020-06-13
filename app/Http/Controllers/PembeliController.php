<?php

namespace App\Http\Controllers;

use App\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index()
    {
        $data = Pembeli::all();

        return view('admin.pembeli.index', compact('data'));
    }

    public function store(Request $request)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([

            'nama_pembeli' => 'required',
            'email' => 'required',
            'telp' =>  'required',
            'alamat' =>  'required',

        ], $messages);

        // create new object
        $data = new Pembeli;
        $data->nama_pembeli = $request->nama_pembeli;
        $data->email = $request->email;
        $data->telp = $request->telp;
        $data->alamat = $request->alamat;
        $data->save();

        return redirect()->back()->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([

            'nama_pembeli' => 'required',
            'email' => 'required',
            'telp' =>  'required',
            'alamat' =>  'required',

        ], $messages);

        // create new object
        $data = Pembeli::findOrFail($request->id);
        $data->nama_pembeli = $request->nama_pembeli;
        $data->email = $request->email;
        $data->telp = $request->telp;
        $data->alamat = $request->alamat;
        $data->update();

        return redirect()->back()->with('success', 'Data Berhasil Disimpan');
    }

    public function delete($id)
    {
        $data = Pembeli::where('uuid', $id)->first();

        $data->delete();

        return redirect()->back();
    }
}
