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
                                        <a class="dropdown-item" target="_blank" href="{{route('terkirimCetak')}}">Status Terkirim</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Pembeli</th>
                                                    <th scope="col">Kode Pengiriman</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Tanggal Pengiriman</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($barangpengiriman as $d)
                                                <tr>
                                                    <td scope="col">{{ $loop->iteration }}</td>
                                                    <td scope="col">{{ $d->pembeli->nama_pembeli }}</td>
                                                    <td scope="col" class="text-center">{{ $d->kode_pengiriman }}</td>
                                                    <td scope="col">{{ $d->barang->nama_barang }}</td>
                                                    <td scope="col" class="text-center">{{Carbon\Carbon::parse($d->tgl_pengiriman)->translatedFormat('d F Y')}}</td>
                                                    <td scope="col">{{ $d->pembeli->alamat }}</td>
                                                    <td scope="col">{{ $d->jumlah }} {{$d->barang->satuan}}</td>
                                                    @if($d->status == 1)
                                                    <td scope="col"><button class="btn btn-warning btn-sm text-white" data-toggle="modal" data-id="{{$d->id}}" data-target="#modalstatus" data-status="{{$d->status}}">Packing</button>
                                                    </td>
                                                    @elseif($d->status == 2)
                                                    <td scope="col"><button class="btn btn-info btn-sm text-white" data-toggle="modal" data-id="{{$d->id}}" data-target="#modalstatus" data-status="{{$d->status}}">Dalam Pengiriman</button>
                                                    </td>
                                                    @elseif($d->status == 3)
                                                    <td scope="col"><button class="btn btn-success btn-sm text-white" data-toggle="modal" data-id="{{$d->id}}" data-target="#modalstatus" data-status="{{$d->status}}">Terkirim</button>
                                                    </td>
                                                    @else
                                                    <td scope="col"><button class="btn btn-success btn-sm text-white" data-toggle="modal" data-id="{{$d->id}}" data-target="#modalstatus" data-status="{{$d->status}}">-</button>
                                                    </td>
                                                    @endif
                                                    @include('admin.barang.pengiriman.status')
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
                            <input type="text" name="kode_pengiriman" id="kode_pengiriman" value="{{old('kode_pengiriman')}}" placeholder="Masukkan Kode Pengiriman" class="form-control @error ('kode_pengiriman') is-invalid @enderror">
                            @error('kode_pengiriman')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Nama Pembeli</label>
                        <div class="form-group">
                            <select class="custom-select selectname" name="pembeli_id" id="pembeli_id">
                                @foreach($pembeli as $d)
                                <option value="{{$d->id}}">{{ $d->nama_pembeli}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- <label>Alamat Pengiriman</label>
                        <div class="form-group">
                            <textarea type="text" name="alamat_pengiriman" id="alamat_pengiriman" placeholder="Masukkan Alamat" class="id form-control">{{ old('alamat_pengiriman') }} </textarea>
                        </div> -->

                        <label>Tanggal Pengiriman</label>
                        <div class="form-group">
                            <input type="date" name="tgl_pengiriman" class="form-control" required>
                        </div>

                        <label>Jumlah</label>
                        <div class="form-group">
                            <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah" value="{{old('jumlah')}}" class="form-control @error ('jumlah') is-invalid @enderror">
                            @error('jumlah')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status Barang</label>
                            <select class="custom-select" name="status" id="status">
                                <option selected value="">Pilih status</option>
                                <option value="1">Packing</option>
                                <option value="2">Dalam Pengiriman</option>
                                <option value="3">Terkirim</option>
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
@endsection

@section('script')
<script>
    $('#modalstatus').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let status = button.data('status')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #status').val(status)
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