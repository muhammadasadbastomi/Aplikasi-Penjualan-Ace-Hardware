@extends('layouts.admin.admin')
@section('title') Admin Edit Data Barang Garansi @endsection
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Barang Garansi</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('garansiIndex')}}">Barang Garansi</a>
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
                            <form method="post">
                                {{method_field('PUT')}}
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="barang_id">Nama barang</label>
                                        <select class="custom-select" name="barang_id" id="barang_id">
                                            @foreach($barang as $b)
                                            <option value="{{$b->id}}" {{ $baranggaransi->barang_id == $b->id ? 'selected' : ''}} selected>
                                                {{$b->nama_barang}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Pembeli </label>
                                        <input type="text" id="nama_pembeli" name="nama_pembeli" class="form-control @error ('nama_pembeli') is-invalid @enderror" placeholder="Masukkan nama pembeli" value="{{ $baranggaransi->nama_pembeli }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_pembelian">Tanggal Pembelian</label>
                                        <input type="date" id="tgl_pembelian" name="tgl_pembelian" class="form-control" value="{{$baranggaransi->tgl_pembelian}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_akhir_garansi">Tanggal Akhir Garansi</label>
                                        <input type="date" id="tgl_akhir_garansi" name="tgl_akhir_garansi" class="form-control" value="{{$baranggaransi->tgl_akhir_garansi}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah </label>
                                        <input type="number" id="jumlah" name="jumlah" class="form-control @error ('jumlah') is-invalid @enderror" placeholder="Masukkan Jumlah" value="{{ $baranggaransi->jumlah }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{route('garansiIndex')}}" class="btn btn-danger text-white"><i class="mdi mdi-back"></i>Kembali</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- app ecommerce details end -->

        </div>
    </div>
</div>

@endsection