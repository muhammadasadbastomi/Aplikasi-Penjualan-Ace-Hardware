<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Auth;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ], $messages);

        $user = new User;
        $user->role = '2';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('userace1');
        $user->save();

        return redirect('admin/account/karyawan')->with('success', 'Data berhasil disimpan');
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
            'email' => ':attribute harus benar.',
            'required' => ':attribute harus diisi.',
            'confirmed' => ':attribute salah.',
            'min' => ':attribute minimal harus 5 karakter.'
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ], $messages);

        $user = new User;
        $user->role = '1';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        $user->password = Hash::make($request->password);
        $user->photos = $request->photos;
        if ($request->hasfile('photos')) {
            $request->file('photos')->move('images/user/', $request->file('photos')->getClientOriginalName());
            $user->photos = $request->file('photos')->getClientOriginalName();
            $user->save();
        }
        $user->save();

        return redirect('admin/account/admin')->with('success', 'Data berhasil disimpan');
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
    public function edit()
    {
        if (Auth::user()){
            $user =  User::find(Auth::user()->id);

            if ($user){
            return view('admin.account.setting')->withUser($user);
            } else {
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
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
    public function update(Request $request)
    {
        $user = User::find(Auth::User()->id);

        if ($user) {
            if (isset($request->email)){
            $validate = null;
            if (Auth::User()->email === $request['email']){
                $validate = $request->validate([
                    'name' => 'required|min:5',
                    'email'=> 'required|email'
                ]);
            } else {
                $validate = $request->validate([
                    'name' => 'required|min:5',
                    'email'=> 'required|email|unique:users'
                ]);
            }

            if ($validate) {
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->nohp = $request['nohp'];
                $user->alamat = $request['alamat'];
                if ($request->photos != null) {
                    $img = $request->file('photos');
                    $FotoExt = $img->getClientOriginalExtension();
                    $FotoName = $request->name;
                    $photos = $FotoName . '.' . $FotoExt;
                    $img->move('images/user', $photos);
                    $user->photos = $photos;
                    $user->update();
                }

                $user->update();
            }
            return redirect()->back()->with('success', 'Profil berhasil diubah');

            } elseif (isset($request->password)){
                $messages = [
                    'confirmed' => ':attribute tidak sama.',
                    'same' => ':attribute tidak sama.'
                ];
                $validate = $request->validate([
                    'password'=> 'same:password_confirmation', 'confirmed',

                ], $messages);

                if (Hash::check($request['oldpassword'], $user->password) && $validate) {
                    $user->password = Hash::make($request['password']);
                    $user->update();

                    return back()->with('success', 'Password Berhasil Diubah');
                } else {
                    return back()->with('warning', 'Password Salah');
                }
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('uuid', $id)->first();

        $user->delete();

        return redirect()->route('userKaryawan');
    }
}
