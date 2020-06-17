@extends('layouts.admin.admin')

@section('title') Admin Data Barang Datang @endsection

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
                        <h2 class="content-header-title float-left mb-0">Data Barang Datang</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Barang Datang
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
                                        <a class="dropdown-item" target="_blank" href="{{route('datangCetak')}}">Keseluruhan</a>
                                        <button class="btn nohover dropdown-item" data-toggle="modal" data-target="#modaltgl">Berdasarkan Tanggal</button>
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
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Tanggal Masuk</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($barangdatang as $bd)
                                                <tr>
                                                    <td scope="col">{{$loop->iteration}}</td>
                                                    <td scope="col">{{ $bd->barang->nama_barang }}</td>
                                                    <td scope="col">
                                                        {{Carbon\Carbon::parse($bd->tgl_masuk)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td scope="col">{{ $bd->jumlah }} {{$bd->barang->satuan}}</td>
                                                    <td scope="col">Rp. {{number_format( $bd->harga, 0, ',', '.')}},-</td>
                                                    <td scope="col">Rp. {{number_format( $bd->total, 0, ',', '.')}},-</td>
                                                    <td scope="col" class="text-center">
                                                        {{-- <a class="btn btn-sm btn-info text-white"
                                                            href="{{route('datangEdit', ['id' => $bd->uuid])}}"><i class="feather icon-edit"></i></a> --}}
                                                        <a class="delete btn btn-sm btn-danger text-white" data-id="{{$bd->uuid}}" href="#"><i class="feather icon-trash"></i></a>
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

@include('admin.barang.datang.cetaktanggal')

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
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="barang">Pilih Barang</label>
                            <select class="custom-select" name="barang_id" id="barang_id">
                                @foreach($barang as $b)
                                <option value="{{$b->id}}">{{ $b->nama_barang}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Tanggal Masuk</label>
                        <div class="form-group">
                            <input type="date" name="tgl_masuk" id="tgl_masuk" value="{{old('tgl_masuk')}}" class="form-control">
                        </div>

                        <label>Harga</label>
                        <div class="form-group">
                            <input type="text" name="harga" id="input1" placeholder="Masukkan Harga" value="{{old('harga')}}" class="form-control">
                        </div>
                        <label>Jumlah</label>
                        <div class="form-group">
                            <input type="text" name="jumlah" id="input2" placeholder="Masukkan Jumlah" value="{{old('jumlah')}}" class="form-control">
                        </div>
                        <label>Total</label>
                        <div class="form-group">
                            <input type="text" name="total" id="input3" value="{{old('total')}}" class="form-control" readonly>
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
                    url: "{{ url('/admin/barang/datang/delete')}}" + '/' + id,
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
    $("#input1,#input2").keyup(function() {
        var val1 = $('#input1').val();
        var val2 = $('#input2').val();
        var kali = Number(val1) * Number(val2);
        if (val1 != "" && val2 != "") {
            $('#input3').val(kali);
        }
    })
</script>
@endsection