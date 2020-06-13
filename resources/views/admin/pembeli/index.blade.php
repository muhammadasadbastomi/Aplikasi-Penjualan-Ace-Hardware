@extends('layouts.admin.admin')

@section('title') Admin Data Pembeli @endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Data Pembeli</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Pembeli
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
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">E-Mail</th>
                                                    <th scope="col">Nomor Telepon</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td><img src="/images/thumbnail/{{$d->gambar}}" alt="Gambar" class="avatar mr-1 avatar-xl" width="60px;" height="50px;">
                                                    </td>
                                                    <td>{{$d->nama_pembeli}}</td>
                                                    <td>{{$d->email}}</td>
                                                    <td>{{$d->telp}}</td>
                                                    <td>{{$d->alamat}}</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-info text-white" data-id="{{$d->id}}" data-judul="{{$d->judul}}" data-ket="{{$d->keterangan}}" data-pict="{{$d->gambar}}" data-toggle="modal" data-target="#editModal">
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


@endsection

@section('script')

<script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var judul = button.data('judul')
        var keterangan = button.data('ket')
        var pict = button.data('pict')
        var modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #judul').val(judul)
        modal.find('.modal-body #keterangan').val(keterangan)
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
@endsection