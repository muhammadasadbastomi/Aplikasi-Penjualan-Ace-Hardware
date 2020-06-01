@extends('layouts.admin.admin')

@section('title') Admin Data Barang Pengiriman @endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Data Barang Pengiriman</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
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
                                <div class="dt-buttons btn-group">
                                    <button class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0" data-toggle="modal" data-target="#mediumModal"><span><i class="feather icon-plus"></i> Tambah
                                            Data</span>
                                    </button>
                                    &emsp13;
                                    <button type="button" class="btn btn-outline-info dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span><i class="feather icon-printer"></i>
                                            Cetak</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" target="_blank" href="{{route('pengirimanCetak')}}">Keseluruhan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">No</th>
                                                    <th scope="col" class="text-center">Nama Pembeli</th>
                                                    <th scope="col" class="text-center">Kode Pengiriman</th>
                                                    <th scope="col" class="text-center">Nama Barang</th>
                                                    <th scope="col" class="text-center">Tanggal Pengiriman</th>
                                                    <th scope="col" class="text-center">Alamat</th>
                                                    <th scope="col" class="text-center">Jumlah</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($barangpengiriman as $d)
                                                <tr>
                                                    <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                                    <td scope="col" class="text-center">{{ $d->nama_pembeli }}</td>
                                                    <td scope="col" class="text-center">{{ $d->kode_pengiriman }}</td>
                                                    <td scope="col" class="text-center">{{ $d->barang->nama_barang }}</td>
                                                    <td scope="col" class="text-center">{{ $d->tgl_pengiriman }}</td>
                                                    <td scope="col" class="text-center">{{ $d->alamat_pengiriman }}</td>
                                                    <td scope="col" class="text-center">{{ $d->jumlah }}</td>
                                                    @if($d->status == 1)
                                                    <td scope="col" class="text-center"><a class="btn btn-warning btn-sm text-white">Packing</a>
                                                    </td>
                                                    @elseif($d->status == 2)
                                                    <td scope="col" class="text-center"><a class="btn btn-info btn-sm text-white">Dalam
                                                            Pengiriman</a>
                                                    </td>
                                                    @elseif($d->status == 3)
                                                    <td scope="col" class="text-center"><a class="btn btn-success btn-sm text-white">Sampai</a>
                                                    </td>
                                                    @else
                                                    <td scope="col" class="text-center"><a class="btn btn-success btn-sm text-white">-</a>
                                                    </td>
                                                    @endif
                                                    <td scope="col" class="text-center">
                                                        <a class="btn btn-sm btn-info text-white" href="{{route('pengirimanEdit', ['id' => $d->uuid])}}"><i class="feather icon-edit"></i></a>
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
                        <div class="form-group">
                            <label for="barang">Pilih Barang</label>
                            <select class="custom-select" name="barang_id" id="barang_id">
                                @foreach($barang as $b)
                                <option value="{{$b->id}}">{{ $b->nama_barang}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Kode pengiriman</label>
                        <div class="form-group">
                            <input type="text" name="kode_pengiriman" id="kode_pengiriman" value="{{old('kode_pengiriman')}}" placeholder="Masukkan Kode Pengiriman" class="form-control">
                        </div>

                        <label>Nama Pembeli</label>
                        <div class="form-group">
                            <input type="text" name="nama_pembeli" id="nama_pembeli" value="{{old('nama_pembeli')}}" placeholder="Masukkan Nama Pembeli" class="form-control">
                        </div>

                        <label>Alamat Pengiriman</label>
                        <div class="form-group">
                            <textarea type="text" name="alamat_pengiriman" id="alamat_pengiriman" placeholder="Masukkan Alamat" class="form-control">{{ old('alamat_pengiriman') }} </textarea>
                        </div>

                        <label>Tanggal Pengiriman</label>
                        <div class="form-group">
                            <input type="date" name="tgl_pengiriman" id="tgl_pengiriman" value="{{old('tgl_pengiriman')}}" class="form-control">
                        </div>

                        <label>Jumlah</label>
                        <div class="form-group">
                            <input type="text" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah" value="{{old('jumlah')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="status">status</label>
                            <select class="custom-select" name="status" id="status">
                                <option selected value="">Pilih status</option>
                                <option value="1">Belum dikirim</option>
                                <option value="2">Dalam pengiriman</option>
                                <option value="3">Dikirim</option>
                            </select>
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
                        <label>Nama Pembeli</label>
                        <div class="form-group">
                            <input type="text" placeholder="Masukkan Nama Pembeli" class="form-control">
                        </div>

                        <label>Tanggal Pengiriman</label>
                        <div class="form-group">
                            <input type="date" class="form-control">
                        </div>

                        <label>Alamat</label>
                        <div class="form-group">
                            <textarea type="text" placeholder="Masukkan Alamat" class="form-control"> </textarea>
                        </div>

                        <label>Jumlah</label>
                        <div class="form-group">
                            <input type="text" placeholder="Masukkan Jumlah" class="form-control">
                        </div>

                        <label>Status</label>
                        <div class="form-group">
                            <input type="text" placeholder="Masukkan Status" class="form-control">
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