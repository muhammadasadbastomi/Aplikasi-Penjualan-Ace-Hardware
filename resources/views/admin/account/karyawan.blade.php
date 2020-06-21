@extends('layouts.admin.admin')

@section('title') User Karyawan @endsection

@section('head')
<style>
    #imgView {
        width: 50%;
        height: 50%;
    }

    #gambar_nodin {
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
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Data User Karyawan</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data User Karyawan
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
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">email</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user as $u)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $u->name }}</td>
                                                    <td>{{ $u->email }}</td>
                                                    <td>
                                                        @if($u->role == 1)
                                                        Admin
                                                        @elseif($u->role == 2)
                                                        Karyawan
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#modaledit" data-id="{{$u->id}}" data-name="{{$u->name}}" data-email="{{$u->email}}" data-gambar="{{$u->photos}}" data-telp="{{$u->nohp}}" data-alamat="{{$u->alamat}}"><i class="feather icon-edit"></i></a>
                                                        <a class="delete btn btn-sm btn-danger text-white" data-id="{{$u->uuid}}" href="#"><i class="feather icon-trash"></i></a>
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
                <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Tambah Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>Nama Lengkap</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="text" name="name" id="name" placeholder="Masukkan Nama Lengkap" value="{{old('name')}}" class="form-control" required>
                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            <div class="form-control-position"><i class="feather icon-user"></i></div>
                        </fieldset>

                        <label>E-Mail</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
                            <div class="form-control-position"><i class="feather icon-mail"></i></div>
                            @error('email')<div class="invalid-feedback"> <strong> {{$message}} </strong> </div>@enderror
                        </fieldset>

                        <label>No.Telepon</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="text" name="nohp" id="nohp" value="{{old('nohp')}}" placeholder="Masukkan Nomor Telepon" class="form-control">
                            <div class="form-control-position"><i class="feather icon-phone"></i></div>
                        </fieldset>

                        <label for="alamat">Alamat</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">{{old('alamat')}}</textarea>
                            <div class="form-control-position"><i class="feather icon-map-pin"></i></div>
                        </fieldset>

                        <label>Password</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                            <div class="form-control-position"><i class="feather icon-lock"></i></div>
                            @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </fieldset>

                        <label>Konfirmasi Password</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="password" id="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            <div class="form-control-position"><i class="feather icon-lock"></i></div>
                        </fieldset>

                        <label for="photos">Photo</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <div class="custom-file">
                                <input type="file" id="photos" class="custom-file-input  @error ('photos') is-invalid @enderror" name="photos" value="{{old('photos')}}">
                                <label class="custom-file-label" for="photos"> <a class="text-secondary" style="margin-left:30px;">Choose file</a> </label>
                                <div class="form-control-position"><i class="feather icon-image"></i></div>
                                @error('photos')<div class="invalid-feedback"> <strong> {{$message}} </strong> </div>@enderror
                            </div>
                        </fieldset>
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
<div class="modal fade text-left" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollable" style="padding-left: 10px;">Edit User Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="/admin/account/admin">
                    {{ method_field('put') }}
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="modal-body">
                        <label>Nama Lengkap</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="text" placeholder="Masukkan Nama Lengkap" class="form-control" name="name" id="name" value="{{old('name')}}" required>
                            <div class="form-control-position"><i class="feather icon-user"></i></div>
                        </fieldset>

                        <label>E-Mail</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="email" placeholder="Masukkan E-mail" class="form-control" name="email" id="email" value="{{old('email')}}" required>
                            <div class="form-control-position"><i class="feather icon-mail"></i></div>
                        </fieldset>

                        <label>Password Lama</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="password" placeholder="Masukkan Password Lama" class="form-control @error('password_lama') is-invalid @enderror" name="password_lama" id="password_lama">
                            <div class="form-control-position"><i class="feather icon-lock"></i></div>
                            @error('password_lama')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            <p>Note : Masukkan Password jika ingin mengubah Password</p>
                        </fieldset>

                        <label>Password Baru</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="password" placeholder="Masukkan Password Baru" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" id="password_baru">
                            <div class="form-control-position"><i class="feather icon-lock"></i></div>
                            @error('password_baru')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            <p>Note : Masukkan Password jika ingin mengubah Password</p>
                        </fieldset>

                        <label>Konfirmasi Password</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <input type="password" placeholder="Masukkan Konfirmasi Password" class="form-control" name="password_konfirmasi" id="password_konfirmasi">
                            <div class="form-control-position"><i class="feather icon-lock"></i></div>
                        </fieldset>

                        <label>Alamat</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <div class="form-control-position"><i class="feather icon-map-pin"></i></div>
                            <textarea type="text" placeholder="Masukkan Alamat" class="form-control" name="alamat" id="alamat"> {{old('alamat')}} </textarea>
                        </fieldset>

                        <label>No.Telepon</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <div class="form-control-position"><i class="feather icon-phone"></i></div>
                            <input type="text" placeholder="Masukkan Nomor Telepon" class="form-control" name="nohp" id="nohp" value="{{old('nohp')}}">
                        </fieldset>

                        <label>Status</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <div class="form-control-position"><i class="feather icon-check-square"></i></div>
                            <input type="text" placeholder="Karyawan" class="form-control" disabled>
                        </fieldset>

                        <label for="pict">Photo</label>
                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input  @error('pict') is-invalid @enderror" name="pict" id="pict" value="{{old('photos')}}">
                                <div class="form-control-position"><i class="feather icon-image"></i></div>
                                <label class="custom-file-label" for="pict"><a class="text-secondary" style="margin-left:30px;">Choose file</a></label>
                                @error('pict')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                <p>Note : Masukkan Photo jika ingin mengubah Photo</p>
                            </div>
                        </fieldset>
                        <div style="padding-top:5px; margin-left:43px" class="float-left">
                            <img src="/img/nopict.png" alt="Gambar Belum Ada" id="pict" style=" width:130px; height:130px;">
                        </div>
                        <div style="padding-top:5px; margin-right:43px;" class="float-right">
                            <img src="/img/nopict.png" id="gambar_nodin" alt="Preview Gambar" style=" width:130px; height:130px; ">
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
    $('#modaledit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var email = button.data('email')
        var nohp = button.data('telp')
        var alamat = button.data('alamat')
        var pict = button.data('gambar')
        var modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #nohp').val(nohp)
        modal.find('.modal-body #alamat').val(alamat)
        modal.find('.modal-body #pict').attr('src', '/images/user/' + pict);
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
                    url: "{{ url('/admin/account/karyawan/delete')}}" + '/' + id,
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