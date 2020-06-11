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
                                <div class="dt-buttons btn-group">
                                    <button class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0" data-toggle="modal" data-target="#mediumModal"><span><i class="feather icon-plus"></i> Tambah
                                            Data</span>
                                    </button>
                                    &emsp13;
                                    <button type="button" class="btn btn-outline-info dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span><i class="feather icon-printer"></i>
                                            Cetak</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" target="_blank" href="{{route('barangCetak')}}">Keseluruhan</a>
                                        <button class="btn nohover dropdown-item" data-toggle="modal" data-target="#modalsupplier">Berdasarkan Supplier</button>
                                        <a class="dropdown-item" target="_blank" href="{{route('diskonCetak')}}">Berdasarkan Diskon</a>
                                        <button class="btn nohover dropdown-item" data-toggle="modal" data-target="#modaldiskon">Berdasarkan Angka Diskon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Kode Barang</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Supplier</th>
                                                    <th scope="col">Kategori</th>
                                                    <th scope="col">Harga Awal</th>
                                                    <th scope="col">Diskon</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($barang as $b)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td><img src="/images/barang/{{$b->gambar}}" alt="Gambar" class="avatar mr-1 avatar-xl" width="50px;" height="50px;">
                                                    </td>
                                                    <td class="text-center">{{$b->kode_barang}}</td>
                                                    <td>{{$b->nama_barang}}</td>
                                                    <td>{{$b->supplier->supplier}}</td>
                                                    <td>
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
                                                    <td>Rp. {{number_format($b->harga_jual, 0, ',', '.')}},-</td>
                                                    <td>
                                                        @if($b->diskon)
                                                        {{ $b->diskon }}%
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @include('admin.barang.master.button')
                                                        <a class="btn btn-sm btn-warning text-white" href="{{route('barangShow', ['id' => $b->uuid])}}"><i class="feather icon-edit"></i></a>
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

@include('admin.barang.master.cetakdiskon')

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
                @include('admin.barang.master.create')
            </div>
        </div>
    </div>
</div>

<!-- Modal show -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="showModalLabel" style="padding-left: 10px;">Barang Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @include('admin.barang.master.detail')
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


<<<<<<< HEAD @endsection=======modal.find('.modal-body #id').val(id) modal.find('.modal-body #satuan').val(satuan) modal.find('.modal-body #departement').val(departement) modal.find('.modal-body #diskon').val(diskon) modal.find('.modal-body #stok').val(stok) modal.find('.modal-body #nama').val(nama) modal.find('.modal-body #kategori').val(kategori) modal.find('.modal-body #harga').val(harga) modal.find('.modal-body #kode').val(kode) modal.find('.modal-body #keterangan').val(keterangan) modal.find('.modal-body #supplier').val(supplier) modal.find('.modal-body #harga_diskon').val(harga_diskon) modal.find('.modal-body #gambar').attr('src', '/images/barang/' + gambar); }) </script> @endsection>>>>>>> 5a6e1ea39640f8960ff292d8e26ec9c01920e545