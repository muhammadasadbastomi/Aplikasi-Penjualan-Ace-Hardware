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
                        <h2 class="content-header-title float-left mb-0">Daftar Barang</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Barang
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
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light "
                                        data-toggle="modal" data-target="#exampleModalCenter">
                                        <i class="feather icon-plus-circle"></i>
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
                                                                aria-controls="DataTables_Table_0"
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
                                                                aria-controls="DataTables_Table_0"></label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table zero-configuration dataTable"
                                                        id="DataTables_Table_0" role="grid"
                                                        aria-describedby="DataTables_Table_0_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1" aria-sort="ascending"
                                                                    aria-label="Name: activate to sort column descending"
                                                                    style="width: 189.6px;">Name</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Position: activate to sort column ascending"
                                                                    style="width: 306.4px;">Position</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Office: activate to sort column ascending"
                                                                    style="width: 137.6px;">Office</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Age: activate to sort column ascending"
                                                                    style="width: 55.2px;">Age</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Start date: activate to sort column ascending"
                                                                    style="width: 108.8px;">Start date</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Salary: activate to sort column ascending"
                                                                    style="width: 90.4px;">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>
                                                                    <a class="btn btn-md btn-info mr-1 mb-1 waves-effect waves-light"
                                                                        href="{{ route('barangShow') }}"><i
                                                                            class="feather icon-edit"></i></a>
                                                                    <a class="btn btn-md btn-danger mr-1 mb-1 waves-effect waves-light"
                                                                        href="#"><i class="feather icon-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th rowspan="1" colspan="1">Name</th>
                                                                <th rowspan="1" colspan="1">Position</th>
                                                                <th rowspan="1" colspan="1">Office</th>
                                                                <th rowspan="1" colspan="1">Age</th>
                                                                <th rowspan="1" colspan="1">Start date</th>
                                                                <th rowspan="1" colspan="1">Salary</th>
                                                            </tr>
                                                        </tfoot>
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
                                                                    aria-controls="DataTables_Table_0" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="DataTables_Table_0" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="DataTables_Table_0" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="DataTables_Table_0" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="DataTables_Table_0_next"><a href="#"
                                                                    aria-controls="DataTables_Table_0" data-dt-idx="4"
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
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
                    <label>Email: </label>
                    <div class="form-group">
                        <input type="text" placeholder="text" class="form-control">
                    </div>

                    <label>Password: </label>
                    <div class="form-group">
                        <input type="text" placeholder="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <fieldset class="form-group">
                        <label for="basicInputFile">Simple File Input</label>
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