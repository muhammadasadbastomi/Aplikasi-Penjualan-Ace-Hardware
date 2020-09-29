@extends('layouts.admin.admin')

@section('title') Edit Pengiriman Barang @endsection

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Barang Pengiriman</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('pengirimanIndex')}}">Barang Pengiriman</a>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="post">
                            {{method_field('PUT')}}
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Kode Pengiriman </label>
                                    <input type="text" id="kode_pengiriman" name="kode_pengiriman"
                                        class="form-control @error ('kode_pengiriman') is-invalid @enderror"
                                        placeholder="Masukkan nama pembeli"
                                        value="{{ $barangpengiriman->kode_pengiriman }}">
                                    @error('kode_pengiriman')<div class="invalid-feedback"> {{$message}} </div>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                    <input type="date" id="tgl_pengiriman" name="tgl_pengiriman" class="form-control"
                                        value="{{$barangpengiriman->tgl_pengiriman}}" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('pengirimanIndex')}}" class="btn btn-danger text-white"><i
                                        class="mdi mdi-back"></i>Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- app ecommerce details end -->
        </div>
    </div>
</div>

@endsection
