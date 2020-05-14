@extends('layouts.admin.admin')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Barang Datang</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Barang Datang</a>
                                </li>
                                <li class="breadcrumb-item active">Edit</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5 mt-2">

                        <div class="col-12 col-md-12">
                            <hr>
                            <form method="post">
                                {{method_field('PUT')}}
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="id_barang">Nama barang</label>
                                        <select class="custom-select" name="id_barang" id="id_barang">
                                            @foreach($barang as $b)
                                            <option value="{{$b->id}}"
                                                {{ $barangdatang->id_barang == $b->id ? 'selected' : ''}} selected>
                                                {{$b->nama_barang}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_masuk">Tanggal Masuk</label>
                                        <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control"
                                            value="{{$barangdatang->tgl_masuk}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah </label>
                                        <input type="number" id="jumlah" name="jumlah"
                                            class="form-control @error ('jumlah') is-invalid @enderror"
                                            placeholder="Masukkan Jumlah" value="{{ $barangdatang->jumlah }}">
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{route('datangIndex')}}" class="btn btn-danger text-white"><i
                                            class="mdi mdi-back"></i>Batal</a>
                                </div>
                            </form>

                            <hr>
                        </div>
                    </div>
                </div>


            </div>

            <!-- app ecommerce details end -->

        </div>
    </div>
</div>

@endsection
