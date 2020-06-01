@extends('layouts.admin.admin')

@section('title') Ubah Data Barang Master @endsection

@section('head')
<style>
    #imgView {
        width: 100%;
        height: 100%;
    }

    #gambar_nodin {
        width: 100%;
        height: 100%;
    }

    .loadAnimate {
        animation: setAnimate ease 2.5s infinite;
    }

    @keyframes setAnimate {
        0% {
            color: #000;
        }

        50% {
            color: transparent;
        }

        99% {
            color: transparent;
        }

        100% {
            color: #000;
        }
    }

    .custom-file-label {
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Ubah Data Barang Master</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('barangIndex')}}">Barang Master</a>
                                </li>
                                <li class="breadcrumb-item active">Ubah Data Barang Master</a>
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
                        <div class="col-12 col-md-12 float-left">
                            <h5>{{ $barang->nama_barang }}
                            </h5>
                            <div class="ecommerce-details-price d-flex flex-wrap">
                                <p class="text-secondary font-small-3 mr-1 mb-0">Kategori :
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
                                    @endif</p>
                            </div>
                            <hr>

                            <div class="col-md-6 col-sm-6 float-left">
                                <form method="post" enctype="multipart/form-data">
                                    {{method_field('PUT')}}
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Barang </label>
                                            <input type="text" id="nama_barang" name="nama_barang" class="form-control @error ('nama_barang') is-invalid @enderror" placeholder="Masukkan nama barang" value="{{$barang->nama_barang}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Barang </label>
                                            <input type="text" id="kode_barang" name="kode_barang" class="form-control @error ('kode_barang') is-invalid @enderror" placeholder="Masukkan kode barang" value="{{$barang->kode_barang}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="supplier">Supplier</label>
                                            <select class="custom-select" name="supplier_id" id="supplier_id">
                                                @foreach($supplier as $s)
                                                <option value="{{$s->id}}" {{ $barang->supplier_id == $s->id ? 'selected' : ''}} selected>
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
                                            <label>Satuan </label>
                                            <input type="text" id="satuan" name="satuan" class="form-control @error ('satuan') is-invalid @enderror" placeholder="Masukkan Harga" value="{{ $barang->satuan }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Departement </label>
                                            <input type="text" id="departement" name="departement" class="form-control @error ('departement') is-invalid @enderror" placeholder="Masukkan departement" value="{{ $barang->departement }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Jual </label>
                                            <input type="number" id="harga_jual" name="harga_jual" class="form-control @error ('harga_jual') is-invalid @enderror" placeholder="Masukkan harga jual" value="{{ $barang->harga_jual }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Diskon </label>
                                            <input type="number" id="diskon" name="diskon" class="form-control @error ('diskon') is-invalid @enderror" placeholder="Masukkan Diskon" value="{{ $barang->diskon }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Stok </label>
                                            <input type="number" id="stok_tersedia" name="stok_tersedia" class="form-control @error ('stok_tersedia') is-invalid @enderror" placeholder="Masukkan stok" value="{{ $barang->stok_tersedia }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskrisi </label>
                                            <textarea type="text" id="keterangan" name="keterangan" class="form-control @error ('keterangan') is-invalid @enderror" placeholder="Masukkan Deskripsi">{{ $barang->keterangan }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Gambar </label>
                                            <div class="custom-file">
                                                <input type="file" id="gambar" class="custom-file-input  @error ('gambar') is-invalid @enderror" name="gambar" value="{{old('gambar')}}">
                                                <label class="custom-file-label" for="gambar">Choose file</label>
                                                @error('gambar')<div class="invalid-feedback"> {{$message}} </div>@enderror
                                                <p>Note : Masukkan Gambar jika ingin mengubah Gambar</p>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary float-left">Update</button>
                                        <a type="button" href="{{route('barangIndex')}}" class="btn btn-danger text-white float-right"><i class="mdi mdi-back"></i>Kembali</a>
                                        <br>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 col-sm-6 float-right">
                                <div class="d-flex align-items-center justify-content-center" style="margin-top:9%;">
                                    <img src="{{$barang->gambar()}}" class="img-fluid" alt="product image" style="width: 70%; height:70%; display: block; margin: auto;">
                                </div>
                                <div class="imgWrap align-items-center justify-content-center" style="margin-top:30%;">
                                    <img src="/img/nopict.png" id="imgView" class="card-img-top img-fluid" style="width: 70%; height:70%; display: block; margin: auto;">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(" #gambar").change(function(event) {
        fadeInAdd();
        getURL(this);
    });
    $("#gambar").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#gambar").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                debugger;
                $('#imgView').attr('src', e.target.result);
                $('#imgView').hide();
                $('#imgView').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd() {
        fadeInAlert();
    }

    function fadeInAlert(text) {
        $(".alert").text(text).addClass("loadAnimate");
    }
</script> @endsection