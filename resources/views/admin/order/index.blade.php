@extends('layouts.admin.admin')

@section('title') Admin Data Order @endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Data Order</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Order
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
                                {{-- <div class="dt-buttons btn-group">
                                    <button class="btn btn-outline-primary" tabindex="0"
                                        aria-controls="DataTables_Table_0" data-toggle="modal"
                                        data-target="#mediumModal"><span><i class="feather icon-plus"></i> Tambah
                                            Data</span></button>
                                    &emsp13;
                                    <button type="button"
                                        class="btn btn-outline-info dropdown-toggle waves-effect waves-light"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span><i
                                                class="feather icon-printer"></i>
                                            Cetak</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" target="_blank"
                                            href="{{route('pembeliCetak')}}">Keseluruhan</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration nowrap" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pemesan</th>
                                            <th scope="col">Barang</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Diskon</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">E-Mail</th>
                                            <th scope="col">Nomor Telepon</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Berlaku</th>
                                            <th scope="col">Status</th>
                                            {{-- <th scope="col" class="text-center">Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$d->nama_order}}</td>
                                            <td>{{$d->barang->nama_barang}}</td>
                                            <td>{{$d->jumlah_order}}</td>
                                            <td>@if($d->diskon_order == null)
                                                -
                                                @elseif($d->diskon_order == !null)
                                                {{ $d->diskon_order }}%
                                                @endif
                                            </td>
                                            <td>{{$d->harga_order}}</td>
                                            <td>{{$d->total_order}}</td>
                                            <td>{{$d->email_order}}</td>
                                            <td>{{$d->telp_order}}</td>
                                            <td>{{$d->alamat_order}}</td>
                                            <td>{{Carbon\Carbon::parse($d->created_at)->translatedFormat('d F Y')}} -
                                                {{Carbon\Carbon::parse($d->tgl_order)->translatedFormat('d F Y')}}</td>
                                            <td>
                                                @if($d->status_diskon == 3)
                                                <span class="badge badge-success">Aktif</span>
                                                @elseif($d->status_diskon == 1)
                                                <span class="badge badge-info">Belum Aktif</span>
                                                @elseif($d->status_diskon == 2)
                                                <span class="badge badge-danger">Expired</span>
                                                @endif
                                            </td>
                                            {{-- <td class="text-center">
                                                <a class="btn btn-sm btn-info text-white" data-id="{{$d->id}}"
                                            data-nama="{{$d->nama_pembeli}}" data-email="{{$d->email}}"
                                            data-telp="{{$d->telp}}" data-alamat="{{$d->alamat}}"
                                            data-toggle="modal" data-target="#editModal">
                                            <i class=" feather icon-edit"></i>
                                            </a>
                                            <a class="delete btn btn-sm btn-danger text-white" data-id="{{$d->uuid}}"
                                                href="#"><i class="feather icon-trash"></i></a>
                                            </td> --}}
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

{{-- @include('admin.pembeli.create')
@include('admin.pembeli.edit') --}}
@endsection

@section('script')

{{-- <script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nama = button.data('nama')
        var alamat = button.data('alamat')
        var telp = button.data('telp')
        var email = button.data('email')
        var modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #nama').val(nama)
        modal.find('.modal-body #alamat').val(alamat)
        modal.find('.modal-body #telp').val(telp)
        modal.find('.modal-body #email').val(email);
    })
</script> --}}

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
                    url: "{{ url('/admin/pembeli/delete')}}" + '/' + id,
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
                    error: function(response){
                         Swal.fire({
                            icon: 'error',
                            title: 'Data Gagal Dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            document.location.reload(true);
                        }, 1000);
                    }
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
