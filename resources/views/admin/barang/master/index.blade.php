@extends('layouts.admin.admin')


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
                        <h2 class="content-header-title float-left mb-0">Daftar Barang Master</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Barang Master
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        <i class="feather icon-plus-circle"> Tambah Data </i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                                        <label>Show <select name="DataTables_Table_0_length"
                                                                aria-controls="example1"
                                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select> entries</label></div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                        <label>Search:<input type="search"
                                                                class="form-control form-control-sm" placeholder=""
                                                                aria-controls="example1"></label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table zero-configuration dataTable"
                                                        id="DataTables_Table_0" role="grid"
                                                        aria-describedby="DataTables_Table_0_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting text-center" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1">No
                                                                </th>
                                                                <th class="sorting text-center" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1">
                                                                    Nama Barang</th>
                                                                <th class="sorting text-center" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1">
                                                                    Supplier</th>
                                                                <th class="sorting text-center" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1">
                                                                    Satuan</th>
                                                                <th class="sorting text-center" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1">
                                                                    Departement</th>
                                                                <th class="sorting text-center" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1">
                                                                    Harga Jual</th>
                                                                <th class="sorting text-center" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1">
                                                                    Stok</th>
                                                                <th class="sorting text-center" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1">
                                                                    Gambar</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($barang as $b)
                                                            <tr role="row" class="odd">
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$b->nama_barang}}</td>
                                                                <td>{{$b->supplier}}</td>
                                                                <td>{{$b->satuan}}</td>
                                                                <td>{{$b->departemen}}</td>
                                                                <td>{{$b->harga_jual}}</td>
                                                                <td>{{$b->stok_tersedia}}</td>
                                                                <td></td>
                                                                <td>
                                                                    <a class="btn btn-md btn-info mr-1 mb-1 waves-effect waves-light text-white"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal"><i
                                                                            class="feather icon-edit"></i></a>
                                                                    <a class="btn btn-md btn-danger mr-1 mb-1 waves-effect waves-light"
                                                                        href="#"><i class="feather icon-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="DataTables_Table_0_info"
                                                        role="status" aria-live="polite">Showing 1 to 10 of 29 entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="DataTables_Table_0_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="DataTables_Table_0_previous"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="DataTables_Table_0_next"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollable">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="{{ route('barangStore') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Nama Barang : </label>
                    <div class="form-group">
                        <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang"
                            value="{{old('nama_barang')}}"
                            class="form-control  @error ('nama_barang') is-invalid @enderror">
                        @error('nama_barang')<div class="invalid-feedback"> {{$message}} </div>@enderror
                    </div>

                    <label>Supplier : </label>
                    <div class="form-group">
                        <input type="text" name="supplier" id="supplier" placeholder="Masukkan Supplier"
                            value="{{old('supplier')}}" class="form-control">
                        @error('supplier')<div class="invalid-feedback"> {{$message}} </div>@enderror
                    </div>

                    <label>Harga Satuan : </label>
                    <div class="form-group">
                        <input type="text" name="satuan" id="satuan" placeholder="Masukkan Satuan"
                            value="{{old('satuan')}}" class="form-control">
                        @error('satuan')<div class="invalid-feedback"> {{$message}} </div>@enderror
                    </div>

                    <label>Departement : </label>
                    <div class="form-group">
                        <input type="text" name="departemen" id="departemen" placeholder="Masukkan Departement"
                            value="{{old('departemen')}}" class="form-control">
                        @error('departemen')<div class="invalid-feedback"> {{$message}} </div>@enderror
                    </div>

                    <label>Harga Jual : </label>
                    <div class="form-group">
                        <input type="text" name="harga_jual" id="harga_jual" placeholder="Masukkan Harga"
                            value="{{old('harga_jual')}}" class="form-control">
                        @error('harga_jual')<div class="invalid-feedback"> {{$message}} </div>@enderror
                    </div>

                    <label>Stok : </label>
                    <div class="form-group">
                        <input type="text" name="stok_tersedia" id="stok_tersedia" placeholder="Masukkan Stok"
                            value="{{old('stok_tersedia')}}" class="form-control">
                        @error('stok')<div class="invalid-feedback"> {{$message}} </div>@enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <fieldset class="form-group">
                        <label for="basicInputFile">Gambar</label>
                        <input type="file" class="form-control-file" id="basicInputFile">
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Tambah</button>
                </div>
            </form>
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

                    <label>Departement : </label>
                    <div class="form-group">
                        <input type="text" placeholder="text" class="form-control">
                    </div>

                    <label>Harga : </label>
                    <div class="form-group">
                        <input type="text" placeholder="text" class="form-control">
                    </div>

                    <label>Stok : </label>
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










<script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>
@endsection
