@extends('layouts.admin.admin')

@section('title') Admin Data Etalase @endsection

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
                        <h2 class="content-header-title float-left mb-0">Data Etalase</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Etalase
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
                                        <table class="table zero-configuration nowrap" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Waktu Aktif</th>
                                                    <th scope="col">Status Etalase</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td><img src="/images/thumbnail/{{$d->gambar}}" alt="Gambar" class="avatar mr-1 avatar-xl" width="60px;" height="50px;">
                                                    </td>
                                                    <td>{{$d->judul}}</td>
                                                    <td> {{Carbon\Carbon::parse($d->tgl_aktif)->translatedFormat('d F Y')}}</td>
                                                    <td>
                                                        @if($d->status_diskon == 1)
                                                        <span class="badge badge-success">Aktif</span>
                                                        @else
                                                        <span class="badge badge-danger">Expired</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$d->keterangan}}</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-info text-white" data-id="{{$d->id}}" data-judul="{{$d->judul}}" data-ket="{{$d->keterangan}}" data-pict="{{$d->gambar}}" data-tgl_aktif="{{$d->tgl_aktif}}" data-toggle="modal" data-target="#editModal">
                                                            <i class=" feather icon-edit"></i>
                                                        </a>
                                                        <a class="delete btn btn-sm btn-danger text-white" data-id="{{$d->uuid}}" href="#"><i class="feather icon-trash"></i></a>
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

<!-- Modal Tambah -->
<div class="modal fade text-left" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Tambah Etalase</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" id="judul" class="form-control  @error ('judul') is-invalid @enderror" placeholder="Masukkan Judul" name="judul" value="{{old('judul')}}">
                            @error('judul')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_aktif">Waktu Aktif</label>
                            <input type="date" id="tgl_aktif" class="form-control  @error ('tgl_aktif') is-invalid @enderror" name="tgl_aktif" value="{{old('tgl_aktif')}}">
                            <p>Note : Masukkan Masa Tanggal Aktif, Berakhir Sampai Tanggal.</p>
                            @error('tgl_aktif')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea id="keterangan" class="form-control  @error ('keterangan') is-invalid @enderror" name="keterangan" placeholder="Masukkan Keterangan">{{old('keterangan')}}</textarea>
                            @error('keterangan')<div class="invalid-feedback"> {{$message}} </div>@enderror
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
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Edit Etalase</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf
                    <div class=" modal-body">
                        @include('admin.thumbnail.form')
                    </div>
                    <div class="edit modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="edit btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var judul = button.data('judul')
        var keterangan = button.data('ket')
        var pict = button.data('pict')
        var tgl_aktif = button.data('tgl_aktif')
        var modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #judul').val(judul)
        modal.find('.modal-body #keterangan').val(keterangan)
        modal.find('.modal-body #tgl_aktif').val(tgl_aktif)
        modal.find('.modal-body #pict').attr('src', '/images/thumbnail/' + pict);
    })
</script>

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
                    url: "{{ url('/admin/thumbnail/delete')}}" + '/' + id,
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

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#gambar_nodin').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#pict").change(function() {
        bacaGambar(this);
    });
</script>
@endsection