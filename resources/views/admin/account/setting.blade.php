@extends('layouts.admin.admin')

@section('title') Admin Account Setting @endsection

@section('head')
<style>
    #imgView {
        width: 200px;
        height: 200px;
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
                        <h2 class="content-header-title float-left mb-0">Edit Profile</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"> Edit Profile
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page start -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active col-md-12"
                                            id="account-vertical-general" aria-labelledby="account-pill-general"
                                            aria-expanded="true">
                                            <form method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-4 float-left">
                                                    <a href="javascript: void(0);">
                                                        <img src="{{$user->photos()}}" class="rounded mr-75"
                                                            alt="Belum Ada Photo"
                                                            style="margin-left: 0px; margin-top:10px;" height="200"
                                                            width="fa-rotate-2700">
                                                    </a>
                                                    <div class="imgWrap" style="margin-top:18px;">
                                                        <img src="/img/nopict.png" id="imgView"
                                                            class=" rounded mr-75 img-fluid"
                                                            style="margin-left: 0px; margin-top:10px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-8 float-right">
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label
                                                                class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                for="photos">Ganti photo</label>
                                                            <input type="file" id="photos" name="photos" hidden
                                                                value="{{$user->photos}}">
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or
                                                                PNG</small></p>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-md-8 float-right" style="margin-bottom:30px;">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="nama">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" id="nama"
                                                                        name="nama" placeholder="Masukkan Nama"
                                                                        value="{{$user->name}}" required
                                                                        data-validation-required-message="This name field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="email">E-mail</label>
                                                                    <input type="email" class="form-control" id="email"
                                                                        name="email" placeholder="Masukkan E-mail"
                                                                        value="{{$user->email}}" required
                                                                        data-validation-required-message="This email field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="telepon">Alamat</label>
                                                                <textarea type="text" class="form-control" id="alamat"
                                                                    name="alamat"
                                                                    placeholder="Masukkan Alamat">{{$user->alamat}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="nohp">No. Telepon</label>
                                                                <input type="text" class="form-control" id="nohp"
                                                                    name="nohp" placeholder="Masukkan Nomor Telepon"
                                                                    value="{{$user->nohp}}">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset"
                                                                class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!----Batas -->
                                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                            aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form method="post">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-old-password">Old Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="account-old-password" required
                                                                    placeholder="Old Password"
                                                                    data-validation-required-message="This old password field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="password">New Password</label>
                                                                <input type="password" name="password" id="password"
                                                                    class="form-control form-control @error ('password') is-invalid @enderror"
                                                                    placeholder="Masukkan Password">
                                                                @error('password')<div class="invalid-feedback">
                                                                    {{$message}}</div>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-retype-new-password">Retype New
                                                                    Password</label>
                                                                <input type="password" name="con-password"
                                                                    class="form-control" required
                                                                    id="account-retype-new-password"
                                                                    data-validation-match-match="password"
                                                                    placeholder="New Password"
                                                                    data-validation-required-message="The Confirm password field is required"
                                                                    minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset"
                                                            class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right content section -->


                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                                    href="#account-vertical-general" aria-expanded="true">
                                    <i class="feather icon-globe mr-50 font-medium-3"></i>
                                    General
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                                    href="#account-vertical-password" aria-expanded="false">
                                    <i class="feather icon-lock mr-50 font-medium-3"></i>
                                    Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- account setting page end -->

        </div>
    </div>
</div>
@endsection

@section('script')
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
