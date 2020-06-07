@extends('layouts.admin.admin')

@section('title')Edit Data Supplier @endsection

@section('content')
<div class="app-content content">
    <div class="content-wrapper">

        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Data Supplier</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('supplierIndex')}}">Data Supplier</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Data Supplier
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
                                    <label>Supplier </label>
                                    <input type="text" id="supplier" name="supplier" class="form-control @error ('supplier') is-invalid @enderror" placeholder="Masukkan supplier" value="{{$supplier->supplier}}">
                                    @error('supplier')<div class="invalid-feedback"> {{$message}} </div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat </label>
                                    <input type="text" id="alamat" name="alamat" class="form-control @error ('alamat') is-invalid @enderror" placeholder="Masukkan alamat" value="{{$supplier->alamat}}">
                                    @error('alamat')<div class="invalid-feedback"> {{$message}} </div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Kontak </label>
                                    <input type="number" id="kontak" name="kontak" class="form-control @error ('kontak') is-invalid @enderror" placeholder="Masukkan kontak" value="{{$supplier->kontak}}">
                                    @error('kontak')<div class="invalid-feedback"> {{$message}} </div>@enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('supplierIndex')}}" class="btn btn-danger text-white"><i class="mdi mdi-back"></i>Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
@endsection