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
}
