@extends('layouts.admin.admin')

@section('title') User Admin @endsection

@section('head')
<style>
    #imgView {
        width: 50%;
        height: 50%;
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
                        <h2 class="content-header-title float-left mb-0">Data User Admin</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data User Admin
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
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">No</th>
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">email</th>
                                                    <th scope="col" class="text-center">Role</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user as $u)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $u->name }}</td>
                                                    <td class="text-center">{{ $u->email }}</td>
                                                    <td class="text-center">
                                                        @if($u->role == 1)
                                                        Admin
                                                        @elseif($u->role == 2)
                                                        Karyawan
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-info text-white" href="{{route('adminEdit', ['id' => $u->uuid])}}"><i class="feather icon-edit"></i></a>
                                                        <a class="delete btn btn-sm btn-danger text-white" data-id="{{$u->uuid}}"><i class="feather icon-trash"></i></a>
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
                    @csrf
                    <div class="modal-body">
                        <label>Nama Lengkap</label>
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Masukkan Nama Lengkap" value="{{old('name')}}" class="form-control">
                            @error('name')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>E-Mail</label>
                        <div class="form-group">
                            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Masukkan Email">
                            @error('email')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>No.Telepon</label>
                        <div class="form-group">
                            <input type="text" name="nohp" id="nohp" value="{{old('nohp')}}" placeholder="Masukkan Nomor Telepon" class="form-control">
                        </div>


                        <label for="alamat">Alamat</label>
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"></textarea>
                        </div>


                        <label>Password</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                            <div class="form-control-position">
                                <i class="feather icon-lock"></i>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </fieldset>
                        <label>Konfirmasi Password</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="password" id="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            <div class="form-control-position">
                                <i class="feather icon-lock"></i>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </fieldset>

                        <div class="form-group">
                            <label for="photos">Photo </label>
                            <div class="custom-file">
                                <input type="file" id="photos" class="custom-file-input  @error ('photos') is-invalid @enderror" name="photos" value="{{old('photos')}}">
                                <label class="custom-file-label" for="photos">Choose file</label>
                                @error('photos')<div class="invalid-feedback"> {{$message}} </div>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="imgWrap">
                            <img src="/img/nopictcreate.png" id="imgView" class="card-img-top img-fluid" style="width: 50%; height:50%; display: block; margin: auto;">
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
</div>

<!-- Modal Edit -->
<div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollable" style="padding-left: 10px;">Edit Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label>Nama Lengkap</label>
                        <div class="form-group">
                            <input type="text" placeholder="Masukkan Nama Lengkap" class="form-control">
                        </div>

                        <label>E-Mail</label>
                        <div class="form-group">
                            <input type="email" class="form-control">
                        </div>

                        <label>No.Telepon</label>
                        <div class="form-group">
                            <input type="text" placeholder="Masukkan Nomor Telepon" class="form-control">
                        </div>

                        <label>Status</label>
                        <fieldset>
                            <div class="form-group">
                                <input type="text" placeholder="Admin" class="form-control" disabled>
                            </div>
                        </fieldset>
                        <label>Photo</label>
                        <div class="form-group">
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
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
                    url: "{{ url('/admin/account/delete')}}" + '/' + id,
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
    $("#photos").change(function(event) {
        fadeInAdd();
        getURL(this);
    });

    $("#photos").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#photos").val();
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