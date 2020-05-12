@extends('layouts.admin.admin')

@section('title') Admin Data Barang Pengiriman @endsection

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
                        <h2 class="content-header-title float-left mb-0">Data Barang Pengiriman</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Barang Pengiriman
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
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#mediumModal">
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
                                                    <th scope="col">Nama Pembeli</th>
                                                    <th scope="col">Tanggal Pengiriman</th>
                                                    <th scope="col">alamat</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#exampleModal"><i class="feather icon-edit"></i></a>
                                                        <a class="btn btn-sm btn-danger text-white" href="#"><i class="feather icon-trash"></i></a>
                                                    </td>
                                                </tr>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <label>Nama Pembeli : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Masukkan Nama Pembeli" class="form-control">
                    </div>

                    <label>Tanggal Pengiriman : </label>
                    <div class="form-group">
                        <input type="date" class="form-control">
                    </div>

                    <label>Alamat : </label>
                    <div class="form-group">
                        <textarea type="text" placeholder="Masukkan Alamat" class="form-control"> </textarea>
                    </div>

                    <label>Jumlah : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Masukkan Jumlah" class="form-control">
                    </div>

                    <label>Status : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Masukkan Status" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <label>Nama Pembeli : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Masukkan Nama Pembeli" class="form-control">
                    </div>

                    <label>Tanggal Pengiriman : </label>
                    <div class="form-group">
                        <input type="date" class="form-control">
                    </div>

                    <label>Alamat : </label>
                    <div class="form-group">
                        <textarea type="text" placeholder="Masukkan Alamat" class="form-control"> </textarea>
                    </div>

                    <label>Jumlah : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Masukkan Jumlah" class="form-control">
                    </div>

                    <label>Status : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Masukkan Status" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    url: "{{ url('/admin/barang/pengiriman/delete')}}" + '/' + id,
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