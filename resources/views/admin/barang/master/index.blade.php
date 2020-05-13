@extends('layouts.admin.admin')

@section('title')Admin Data Barang @endsection

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
                        <h2 class="content-header-title float-left mb-0">Data Barang Master</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Barang Master
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
                                <div class="dt-buttons btn-group"><button class="btn btn-outline-primary" tabindex="0"
                                        aria-controls="DataTables_Table_0" data-toggle="modal"
                                        data-target="#mediumModal"><span><i class="feather icon-plus"></i> Tambah
                                            Data</span></button> </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Supplier</th>
                                                    <th scope="col">Satuan</th>
                                                    <th scope="col">Departement</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Stok</th>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col" class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($barang as $b)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{$b->nama_barang}}</td>
                                                    <td>{{$b->supplier->supplier}}</td>
                                                    <td>{{$b->satuan}}</td>
                                                    <td>{{$b->departement}}</td>
                                                    <td>{{$b->harga_jual}}</td>
                                                    <td>{{$b->stok_tersedia}}</td>
                                                    <td></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info text-white"
                                                            href="{{route('barangShow', ['id' => $b->uuid])}}"><i
                                                                class="feather icon-edit"></i></a>
                                                        <a class="delete btn btn-sm btn-danger text-white"
                                                            data-id="{{$b->uuid}}" href="#"><i
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

<!-- Modal Tambah-->
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
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <label>Nama Barang</label>
                        <div class="form-group">
                            <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang"
                                value="{{old('nama_barang')}}"
                                class="form-control  @error ('nama_barang') is-invalid @enderror">
                            @error('nama_barang')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="supplier">Supplier</label>
                            <select class="custom-select" name="supplier_id" id="supplier_id">
                                @foreach($supplier as $s)
                                <option value="{{$s->id}}">{{ $s->supplier}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Harga Satuan</label>
                        <div class="form-group">
                            <input type="text" name="satuan" id="satuan" placeholder="Masukkan Satuan"
                                value="{{old('satuan')}}" class="form-control">
                            @error('satuan')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Departement</label>
                        <div class="form-group">
                            <input type="text" name="departement" id="departement" placeholder="Masukkan Departement"
                                value="{{old('departement')}}" class="form-control">
                            @error('departement')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Harga Jual</label>
                        <div class="form-group">
                            <input type="text" name="harga_jual" id="harga_jual" placeholder="Masukkan Harga"
                                value="{{old('harga_jual')}}" class="form-control">
                            @error('harga_jual')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Stok</label>
                        <div class="form-group">
                            <input type="text" name="stok_tersedia" id="stok_tersedia" placeholder="Masukkan Stok"
                                value="{{old('stok_tersedia')}}" class="form-control">
                            @error('stok')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Gambar Barang</label>
                                <input type="file" name="gambar" id="gambar" class="form-control-file"
                                    id="basicInputFile">
                            </fieldset>
                            @error('gambar')<div class="invalid-feedback"> {{$message}} </div>@enderror
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

<!-- Modal Edit -->
<<<<<<< HEAD <div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollable" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        =======
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                role="document">
                >>>>>>> e7125c90b9632d06c3949905ffca2143b9bcc309
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
                                <label>Nama Barang</label>
                                <div class="form-group">
                                    <input type="text" placeholder="Masukkan Nama Barang" class="form-control">
                                </div>

                                <label>Supplier</label>
                                <div class="form-group">
                                    <input type="text" placeholder="Masukkan Supplier" class="form-control">
                                </div>

                                <label>Satuan</label>
                                <div class="form-group">
                                    <input type="text" placeholder="Masukkan Satuan" class="form-control">
                                </div>

                                <label>Departement</label>
                                <div class="form-group">
                                    <input type="text" placeholder="Masukkan Departement" class="form-control">
                                </div>

                                <label>Harga</label>
                                <div class="form-group">
                                    <input type="text" placeholder="Masukkan Harga" class="form-control">
                                </div>

                                <label>Stok</label>
                                <div class="form-group">
                                    <input type="text" placeholder="Masukkan Stok" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <fieldset class="form-group">
                                    <label for="basicInputFile">Gambar</label>
                                    <input type="file" name="gambar" class="form-control-file" id="basicInputFile">
                                </fieldset>
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
                        url: "{{ url('/admin/barang/master/delete')}}" + '/' + id,
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
