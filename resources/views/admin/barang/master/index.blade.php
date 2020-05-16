@extends('layouts.admin.admin')

@section('title')Admin Data Barang @endsection

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

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Data Barang Master</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Barang Master
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                                <div class="dt-buttons btn-group"><button class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0" data-toggle="modal" data-target="#mediumModal"><span><i class="feather icon-plus"></i> Tambah
                                            Data</span></button> </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">No</th>
                                                    <th scope="col" class="text-center">Gambar</th>
                                                    <th scope="col" class="text-center">Nama Barang</th>
                                                    <th scope="col" class="text-center">Kode Barang</th>
                                                    <th scope="col" class="text-center">Supplier</th>
                                                    <th scope="col" class="text-center">Kategori</th>
                                                    <th scope="col" class="text-center">Satuan</th>
                                                    <th scope="col" class="text-center">Departement</th>
                                                    <th scope="col" class="text-center">Harga</th>
                                                    <th scope="col" class="text-center">Diskon</th>
                                                    <th scope="col" class="text-center">Stok</th>
                                                    <th scope="col" class="text-center" width="100px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($barang as $b)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td><img src="/images/barang/{{$b->gambar}}" alt="Gambar" class="avatar mr-1 avatar-xl" width="50px;" height="50px;"></td>
                                                    <td class="text-center">{{$b->nama_barang}}</td>
                                                    <td class="text-center">{{$b->kode_barang}}</td>
                                                    <td class="text-center">{{$b->supplier->supplier}}</td>
                                                    <td class="text-center">
                                                        @if($b->kategori == 1)
                                                        Alat Rumah
                                                        @elseif($b->kategori == 2)
                                                        Alat Kebersihan
                                                        @elseif($b->kategori == 3)
                                                        Alat Dapur
                                                        @elseif($b->kategori == 4)
                                                        Otomotif
                                                        @elseif($b->kategori == 5)
                                                        Peralatan Elektronik
                                                        @elseif($b->kategori == 6)
                                                        Olahraga & Outdoor
                                                        @elseif($b->kategori == 7)
                                                        Lain-lain
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td class="text-center">{{$b->satuan}}</td>
                                                    <td class="text-center">{{$b->departement}}</td>
                                                    <td class="text-center">{{$b->harga_jual}}</td>
                                                    <td class="text-center">{{$b->diskon}} %</td>
                                                    <td class="text-center">{{$b->stok_tersedia}}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info text-white" href="{{route('barangShow', ['id' => $b->uuid])}}"><i class="feather icon-edit"></i></a>
                                                        <a class="delete btn btn-sm btn-danger text-white" data-id="{{$b->uuid}}" href="#"><i class="feather icon-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /table -->
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Modal Tambah-->
<div class="modal fade text-left" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <label>Nama Barang</label>
                        <div class="form-group">
                            <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" value="{{old('nama_barang')}}" class="form-control  @error ('nama_barang') is-invalid @enderror">
                            @error('nama_barang')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Kode Barang</label>
                        <div class="form-group">
                            <input type="text" name="kode_barang" id="kode_barang" placeholder="Masukkan kode Barang" value="{{old('kode_barang')}}" class="form-control  @error ('kode_barang') is-invalid @enderror">
                            @error('kode_barang')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="supplier">Supplier</label>
                            <select class="custom-select" name="supplier_id" id="supplier_id">
                                @foreach($supplier as $s)
                                <option value="{{$s->id}}">{{ $s->supplier}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="custom-select" name="kategori" id="kategori">
                                <option selected value="">Pilih kategori</option>
                                <option value="1">Alat Rumah</option>
                                <option value="2">Alat Kebersihan</option>
                                <option value="3">Dapur</option>
                                <option value="4">Otomotif</option>
                                <option value="5">Peralatan Elektronik</option>
                                <option value="6">Olahraga & Outdoor</option>
                                <option value="7">Lain-lain</option>
                            </select>
                        </div>

                        <label>Harga Satuan</label>
                        <div class="form-group">
                            <input type="text" name="satuan" id="satuan" placeholder="Masukkan Satuan" value="{{old('satuan')}}" class="form-control">
                            @error('satuan')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Departement</label>
                        <div class="form-group">
                            <input type="text" name="departement" id="departement" placeholder="Masukkan Departement" value="{{old('departement')}}" class="form-control">
                            @error('departement')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Harga Jual</label>
                        <div class="form-group">
                            <input type="text" name="harga_jual" id="harga_jual" placeholder="Masukkan Harga" value="{{old('harga_jual')}}" class="form-control">
                            @error('harga_jual')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Stok</label>
                        <div class="form-group">
                            <input type="text" name="stok_tersedia" id="stok_tersedia" placeholder="Masukkan Stok" value="{{old('stok_tersedia')}}" class="form-control">
                            @error('stok')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar </label>
                            <div class="custom-file">
                                <input type="file" id="gambar" class="custom-file-input  @error ('gambar') is-invalid @enderror" name="gambar" value="{{old('gambar')}}">
                                <label class="custom-file-label" for="gambar">Choose file</label>
                                @error('gambar')<div class="invalid-feedback"> {{$message}} </div>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="imgWrap">
                            <img src="/img/nopictcreate.png" id="imgView" class="card-img-top img-fluid" style="width: 30%; height:30%; display: block; margin: auto;">
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal.fire({
            title: "Apakah anda yakin?",
            icon: "warning",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('/admin/barang/master/delete')}}" + '/' + id,
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Berhasil Dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            document.location.reload(true);
                        }, 1000);
                    },
                })
            } else if (result.dismiss === swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'data batal dihapus',
                    'error'
                )
            }
        })
    });
</script>

<script>
    $("#gambar").change(function(event) {
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
</script>

@endsection