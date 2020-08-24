@extends('layouts.admin.admin')

@section('title') Admin Data Barang Terjual @endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">

        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Data Barang Terjual</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Barang Terjual
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
                                    <button class="btn btn-outline-primary" tabindex="0"
                                        aria-controls="DataTables_Table_0" data-toggle="modal"
                                        data-target="#mediumModal"><span><i class="feather icon-plus"></i> Tambah
                                            Data</span>
                                    </button>
                                    &emsp13;
                                    <button type="button"
                                        class="btn btn-outline-info dropdown-toggle waves-effect waves-light"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span><i
                                                class="feather icon-printer"></i>
                                            Cetak</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" target="_blank"
                                            href="{{route('terjualCetak')}}">Keseluruhan</a>
                                        <button class="btn nohover dropdown-item" data-toggle="modal"
                                            data-target="#modaltgl">Berdasarkan Tanggal</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">No</th>
                                                    <th scope="col" class="text-center">Nama Barang</th>
                                                    <th scope="col" class="text-center">Supplier</th>
                                                    <th scope="col" class="text-center">Departement</th>
                                                    <th scope="col" class="text-center">Tanggal Terjual</th>
                                                    <th scope="col" class="text-center">Jumlah Terjual</th>
                                                    <th scope="col" class="text-center">Harga Awal</th>
                                                    <th scope="col" class="text-center">Diskon</th>
                                                    <th scope="col" class="text-center">Total Harga</th>
                                                    <th scope="col" class="text-center">Metode</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($barangterjual as $bt)
                                                <tr>
                                                    <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                                    <td scope="col" class="text-center">{{ $bt->barang->nama_barang }}
                                                    </td>
                                                    <td scope="col" class="text-center">
                                                        {{ $bt->barang->supplier->supplier }}
                                                    </td>
                                                    <td scope="col" class="text-center">
                                                        {{ $bt->barang->departement }}
                                                    </td>
                                                    <td scope="col" class="text-center">
                                                        {{Carbon\Carbon::parse($bt->tgl_terjual)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td scope="col" class="text-center">{{ $bt->jumlah_terjual }}
                                                        {{$bt->barang->satuan->nama_satuan}}
                                                    </td>
                                                    <td scope="col" class="text-center">Rp.
                                                        {{number_format( $bt->harga_terjual, 0, ',', '.')}},-
                                                    </td>
                                                    <td scope="col" class="text-center">
                                                        @if($bt->diskon_terjual)
                                                        {{$bt->diskon_terjual}}
                                                        @else -
                                                        @endif
                                                    </td>
                                                    <td scope="col" class="text-center">Rp.
                                                        {{number_format( $bt->total_terjual, 0, ',', '.')}},-
                                                    </td>
                                                    <td scope="col" class="text-center">
                                                        @if ($bt->metode == 0)
                                                        Terima ditempat
                                                        @else
                                                        Kirim
                                                        @endif
                                                    </td>
                                                    <td scope="col" class="text-center">
                                                        {{-- <a class="btn btn-sm btn-info text-white"
                                                            href="{{route('terjualEdit', ['id' => $bt->uuid])}}"><i
                                                            class="feather icon-edit"></i></a> --}}
                                                        <a class="delete btn btn-sm btn-danger text-white"
                                                            data-id="{{$bt->uuid}}" href="#"><i
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

@include('admin.barang.terjual.cetaktanggal')

<!-- Modal Tambah -->
<div class="modal fade text-left" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true" style="display: none;">
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
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="barang">Pilih Barang</label>
                            <select class="custom-select" name="barang_id" id="barang_id">
                                @foreach($barang as $b)
                                <option value="{{$b->id}}">{{ $b->nama_barang}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="metode">Pilih Metode</label>
                            <select class="custom-select" name="metode" id="metode">
                                <option value="0">Terima ditempat</option>
                                <option value="1">Kirim</option>
                            </select>
                        </div>

                        <label>Jumlah Terjual</label>
                        <div class="form-group">
                            <input type="number" name="jumlah_terjual" id="jumlah_terjual" placeholder="Masukkan Jumlah"
                                value="{{old('jumlah_terjual')}}"
                                class="form-control  @error ('jumlah_terjual') is-invalid @enderror">
                            @error('jumlah_terjual')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Tanggal Terjual</label>
                        <div class="form-group">
                            <input type="date" name="tgl_terjual" id="tgl_terjual" value="{{old('tgl_terjual')}}"
                                class="form-control  @error ('tgl_terjual') is-invalid @enderror">
                            @error('tgl_terjual')<div class="invalid-feedback"> {{$message}} </div>@enderror
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
<div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Edit Barang Terjual</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>Nama Barang</label>
                        <div class="form-group">
                            <input type="text" placeholder="Masukkan Nama Barang" class="form-control">
                        </div>

                        <label>Jumlah Terjual</label>
                        <div class="form-group">
                            <input type="text" placeholder="Masukkan Jumlah Terjual" class="form-control">
                        </div>

                        <label>Tanggal Terjual</label>
                        <div class="form-group">
                            <input type="date" class="form-control">
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
                    url: "{{ url('/admin/barang/terjual/delete')}}" + '/' + id,
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
