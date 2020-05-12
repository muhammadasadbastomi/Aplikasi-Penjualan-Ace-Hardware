@extends('layouts.admin.admin')

@section('title')Admin Data Supplier @endsection

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
                        <h2 class="content-header-title float-left mb-0">Data Supplier</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Supplier
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
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#mediumModal">
                                    <i class="feather icon-plus-circle"> Tambah Data </i>
                                </button>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Supplier</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Kontak</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($supplier as $s)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$s->supplier}}</td>
                                                    <td>{{$s->supplier}}</td>
                                                    <td>{{$s->kontak}}</td>
                                                    <td></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info text-white" data-toggle="modal"
                                                            data-target="#exampleModal"><i
                                                                class="feather icon-edit"></i></a>
                                                        <a class="delete btn btn-sm btn-danger text-white"
                                                            data-id="{{$s->uuid}}" href="#"><i
                                                                class="feather icon-trash"></i></a>
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
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollable">Tambah Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    @csrf
                    <label>Supplier : </label>
                    <div class=" form-group">
                        <input type="text" name="supplier" id="supplier" placeholder="Masukkan Nama Supplier"
                            value="{{old('supplier')}}" class="form-control  @error ('supplier') is-invalid @enderror">
                        @error('supplier')<div class="invalid-feedback"> {{$message}} </div>@enderror
                    </div>

                    <label>Alamat </label>
                    <div class="form-group">
                        <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat"
                            value="{{old('alamat')}}" class="form-control">
                        @error('alamat')<div class="invalid-feedback"> {{$message}} </div>@enderror
                    </div>

                    <label>Kontak </label>
                    <div class="form-group">
                        <input type="number" name="kontak" id="kontak" placeholder="Masukkan kontak"
                            value="{{old('kontak')}}" class="form-control">
                        @error('kontak')<div class="invalid-feedback"> {{$message}} </div>@enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollable">Ubah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <label>Nama Barang : </label>
                    <div class="form-group">
                        <input type="text" placeholder="text" class="form-control">
                    </div>

                    <label>Supplier : </label>
                    <div class="form-group">
                        <input type="text" placeholder="text" class="form-control">
                    </div>

                    <label>Satuan : </label>
                    <div class="form-group">
                        <input type="text" placeholder="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <fieldset class="form-group">
                        <label for="basicInputFile">Gambar</label>
                        <input type="file" class="form-control-file" id="basicInputFile">
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Login</button>
                </div>
            </form>
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
                    url: "{{ url('/admin/barang/supplier/delete')}}" + '/' + id,
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
@endsection
