@extends('layouts.admin.admin')

@section('title') Admin Data Barang Rusak @endsection

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
                        <h2 class="content-header-title float-left mb-0">Data Barang Rusak</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Barang Rusak
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
                                                    <th scope="col" class="text-center">Nama Barang</th>
                                                    <th scope="col" class="text-center">Kerusakan</th>
                                                    <th scope="col" class="text-center">Tanggal Cek</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Tanggal Selesai</th>
                                                    <th scope="col" class="text-center">Jumlah</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($barangrusak as $br)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $br->barang->nama_barang }}</td>
                                                    <td class="text-center">{{ $br->kerusakan }}</td>
                                                    <td class="text-center">{{ $br->tgl_cek }}</td>
                                                    @if($br->status == 1)
                                                    <td class="text-center"><button type="button" class="btn btn-flat-warning mr-1 mb-1 waves-effect waves-light">Belum diperbaiki</button>
                                                    </td>
                                                    @elseif($br->status == 2)
                                                    <td class="text-center"><button type="button" class="btn btn-flat-info mr-1 mb-1 waves-effect waves-light">Dalam Perbaikan</button>
                                                    </td>
                                                    @elseif($br->status == 3)
                                                    <td class="text-center"><button type="button" class="btn btn-flat-success mr-1 mb-1 waves-effect waves-light">Selesai Perbaikan</button>
                                                    </td>
                                                    @elseif($br->status == 4)
                                                    <td class="text-center"><button type="button" class="btn btn-flat-danger mr-1 mb-1 waves-effect waves-light">Tidak Bisa Diperbaiki</button>
                                                    </td>
                                                    @else
                                                    <td class="text-center"><a class="btn btn-success btn-sm text-white">-</a>
                                                    </td>
                                                    @endif
                                                    <!-- <td class="text-center">{{ $br->tgl_selesai }}</td> -->
                                                    <td class="text-center">
                                                        @if($br->tgl_selesai)
                                                        {{ $br->tgl_selesai }}
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td class="text-center">{{ $br->jumlah_barang }}</td>

                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-info text-white" href="{{route('rusakEdit', ['id' => $br->uuid])}}"><i class="feather icon-edit"></i></a>
                                                        <a class="delete btn btn-sm btn-danger text-white" data-id="{{$br->uuid}}" href="#"><i class="feather icon-trash"></i></a>
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
                <form method="POST">
                    @csrf
                    <div class=" modal-body">
                        <div class="form-group">
                            <label for="barang">Pilih Barang</label>
                            <select class="custom-select" name="barang_id" id="barang_id">
                                @foreach($barang as $b)
                                <option value="{{$b->id}}">{{ $b->nama_barang}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Kerusakan</label>
                        <div class="form-group">
                            <input type="text" name="kerusakan" id="kerusakan" placeholder="Masukkan Kerusakan Barang" value="{{old('kerusakan')}}" class="form-control">
                        </div>

                        <label>Tanggal Cek</label>
                        <div class="form-group">
                            <input type="date" name="tgl_cek" id="tgl_cek" value="{{old('tgl_cek')}}" class="form-control">
                        </div>

                        <label>Jumlah</label>
                        <div class="form-group">
                            <input type="text" name="jumlah_barang" id="jumlah_barang" placeholder="Masukkan Jumlah" value="{{old('jumlah_barang')}}" class="form-control">
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
                    url: "{{ url('/admin/barang/rusak/delete')}}" + '/' + id,
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