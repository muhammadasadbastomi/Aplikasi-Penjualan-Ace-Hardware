<?php

namespace App\Http\Controllers;

use App\User;
use App\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'desc')->get();

        return view('admin.account.index', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $user = User::where('role', [1])->orderBy('id', 'desc')->get();

        return view('admin.account.admin', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function karyawan()
    {
        $user = User::where('role', [2])->orderBy('id', 'desc')->get();

        return view('admin.account.karyawan', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'email' => ':attribute harus benar.',
            'required' => ':attribute harus diisi.',
            'confirmed' => ':attribute salah.',
            'min' => ':attribute minimal 5 karakter.'
        ];
        //dd($request->all());
        $request->validate([
            'nama' => 'required',
            'email' => 'email|unique:users',
            'password' => 'required|confirmed|min:5',
            'tempat_lahir' => 'required',
        ], $messages);

        $user = new User;
        $user->role = '2';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('uuid', $id)->first();

        return view('admin.account.setting', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminedit($id)
    {
        $user = User::where('uuid', $id)->first();

        return view('admin.account.edit', compact('user'));
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
        // $messages = [
        //     'unique' => ':attribute sudah terdaftar.',
        //     'required' => ':attribute harus diisi.',

        // ];
        // $request->validate([

        //     'judul' => 'required',
        //     'keterangan' => 'required',

        // ], $messages);

        $data = user::where('uuid', $id)->first();
        $data->name = $request->nama;
        $data->alamat = $request->alamat;
        $data->nohp = $request->nohp;
        $data->email = $request->email;
        if ($request->photos != '') {
            $path = public_path() . '/images/user/';

            //code for remove old photos
            if ($data->photos != ''  && $data->photos != null) {
                $file_old = $path . $data->photos;
                unlink($file_old);
            }
            if (!$request->photos) {
                $photos = $data->photos;
            } else {
                //upload new photos
                $photos = $request->photos;
                $filename = $photos->getClientOriginalName();
                $photos->move($path, $filename);
            }

            //for update in table
            $data->update(['photos' => $filename]);
        }

        $data->update();
        // dd($data);
        return back()->with('success', 'Data Berhasil Diubah');
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
