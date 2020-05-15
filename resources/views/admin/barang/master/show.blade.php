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
                        <h2 class="content-header-title float-left mb-0">Product Details</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Barang</a>
                                </li>
                                <li class="breadcrumb-item active">Show</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- app ecommerce details start -->
            <section class="app-ecommerce-details">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5 mt-2">
                            <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="{{$barang->gambar()}}" class="img-fluid" alt="product image">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5>{{ $barang->nama_barang }}
                                </h5>
                                <div class="ecommerce-details-price d-flex flex-wrap">

                                    <p class="text-primary font-medium-3 mr-1 mb-0">Rp. {{ $barang->harga_jual }}</p>

                                </div>
                                <hr>
                                <form method="post" enctype="multipart/form-data">
                                    {{method_field('PUT')}}
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Barang </label>
                                            <input type="text" id="nama_barang" name="nama_barang"
                                                class="form-control @error ('nama_barang') is-invalid @enderror"
                                                placeholder="Masukkan nama barang" value="{{$barang->nama_barang}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Barang </label>
                                            <input type="text" id="kode_barang" name="kode_barang"
                                                class="form-control @error ('kode_barang') is-invalid @enderror"
                                                placeholder="Masukkan kode barang" value="{{$barang->kode_barang}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="supplier">Supplier</label>
                                            <select class="custom-select" name="supplier_id" id="supplier_id">
                                                @foreach($supplier as $s)
                                                <option value="{{$s->id}}"
                                                    {{ $barang->supplier_id == $s->id ? 'selected' : ''}} selected>
                                                    {{$s->supplier}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">kategori</label>
                                            <select class="custom-select" name="kategori" id="kategori">
                                                <option value="{{ $barang->kategori}}" selected>
                                                    @if($barang->kategori == 1)
                                                    Alat Rumah
                                                    @elseif($barang->kategori == 2)
                                                    Alat Kebersihan
                                                    @elseif($barang->kategori == 3)
                                                    Alat Dapur
                                                    @elseif($barang->kategori == 4)
                                                    Otomotif
                                                    @elseif($barang->kategori == 5)
                                                    Peralatan Elektronik
                                                    @elseif($barang->kategori == 6)
                                                    Olahraga & Outdoor
                                                    @elseif($barang->kategori == 7)
                                                    Lain-lain
                                                    @else
                                                    -
                                                    @endif
                                                <option value="1">Alat Rumah</option>
                                                <option value="2">Alat Kebersihan</option>
                                                <option value="3">Dapur</option>
                                                <option value="4">Otomotif</option>
                                                <option value="5">Peralatan Elektronik</option>
                                                <option value="6">Olahraga & Outdoor</option>
                                                <option value="7">Lain-lain</option>
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Harga satuan </label>
                                            <input type="number" id="satuan" name="satuan"
                                                class="form-control @error ('satuan') is-invalid @enderror"
                                                placeholder="Masukkan Harga" value="{{ $barang->satuan }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Departement </label>
                                            <input type="text" id="departement" name="departement"
                                                class="form-control @error ('departement') is-invalid @enderror"
                                                placeholder="Masukkan departement" value="{{ $barang->departement }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Jual </label>
                                            <input type="number" id="harga_jual" name="harga_jual"
                                                class="form-control @error ('harga_jual') is-invalid @enderror"
                                                placeholder="Masukkan harga jual" value="{{ $barang->harga_jual }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Diskon </label>
                                            <input type="number" id="diskon" name="diskon"
                                                class="form-control @error ('diskon') is-invalid @enderror"
                                                placeholder="Masukkan Diskon" value="{{ $barang->diskon }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Stok </label>
                                            <input type="number" id="stok" name="stok_tersedia"
                                                class="form-control @error ('stok_tersedia') is-invalid @enderror"
                                                placeholder="Masukkan stok" value="{{ $barang->stok_tersedia }}">
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Gambar Barang</label>
                                                <input type="file" name="gambar" id="gambar" class="form-control-file"
                                                    id="basicInputFile">
                                            </fieldset>
                                            @error('gambar')<div class="invalid-feedback"> {{$message}} </div>@enderror
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{route('barangIndex')}}" class="btn btn-danger text-white"><i
                                                class="mdi mdi-back"></i>Batal</a>
                                    </div>
                                </form>

                                <hr>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <!-- app ecommerce details end -->

        </div>
    </div>
</div>

@endsection
