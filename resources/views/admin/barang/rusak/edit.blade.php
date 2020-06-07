@extends('layouts.admin.admin')

@section('title') Ubah Data Barang Rusak @endsection

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Barang Rusak</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('rusakIndex')}}">Barang Rusak</a>
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
                                        <option value="{{$b->id}}" {{ $barangrusak->barang_id == $b->id ? 'selected' : ''}} selected>
                                            {{$b->nama_barang}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kerusakan </label>
                                    <input type="text" id="kerusakan" name="kerusakan" class="form-control @error ('kerusakan') is-invalid @enderror" placeholder="Masukkan kerusakan" value="{{ $barangrusak->kerusakan }}">
                                </div>

                                <div class="form-group">
                                    <label for="tgl_cek">Tanggal Cek</label>
                                    <input type="date" id="tgl_cek" name="tgl_cek" class="form-control" value="{{$barangrusak->tgl_cek}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Barang</label>
                                    <select class="custom-select" name="status" id="status">
                                        <option selected value="">Pilih status</option>
                                        <option value="1" {{ $barangrusak->status == 1 ? 'selected' : '' }}>Belum diperbaiki
                                        </option>
                                        <option value="2" {{ $barangrusak->status == 2 ? 'selected' : '' }}>Dalam perbaikan
                                        </option>
                                        <option value="3" {{ $barangrusak->status == 3 ? 'selected' : '' }}>Selesai
                                            diperbaiki</option>
                                        <option value="4" {{ $barangrusak->status == 4 ? 'selected' : '' }}>Tidak bisa
                                            diperbaiki</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_selesai">Tanggal Selesai</label>
                                    <input type="date" id="tgl_selesai" name="tgl_selesai" class="form-control" value="{{$barangrusak->tgl_selesai}}">
                                </div>

                                <div class="form-group">
                                    <label>Jumlah </label>
                                    <input type="number" id="jumlah_barang" name="jumlah_barang" class="form-control @error ('jumlah_barang') is-invalid @enderror" placeholder="Masukkan Jumlah" value="{{ $barangrusak->jumlah_barang }}">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('rusakIndex')}}" class="btn btn-danger text-white"><i class="mdi mdi-back"></i>Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection