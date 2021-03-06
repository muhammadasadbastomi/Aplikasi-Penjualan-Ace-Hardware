@extends('layouts.admin.admin')
@section('title') Admin Edit Data Barang Terjual @endsection
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Barang Terjual</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('terjualIndex')}}">Barang Terjual</a>
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
                                    <label for="barang_id">Nama barang</label>
                                    <select class="custom-select" name="barang_id" id="barang_id">
                                        @foreach($barang as $b)
                                        <option value="{{$b->id}}" {{ $barangterjual->barang_id == $b->id ? 'selected' : ''}} selected>
                                            {{$b->nama_barang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_terjual">Tanggal Terjual</label>
                                    <input type="date" id="tgl_terjual" name="tgl_terjual" class="form-control" value="{{$barangterjual->tgl_terjual}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Terjual</label>
                                    <input type="text" id="jumlah_terjual" name="jumlah_terjual" class="form-control @error ('jumlah_terjual') is-invalid @enderror" placeholder="Masukkan jumlah_terjual" value="{{ $barangterjual->jumlah_terjual }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('terjualIndex')}}" class="btn btn-danger text-white"><i class="mdi mdi-back"></i>Kembali</a>
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