@extends('layouts.admin.admin')

@section('title') Admin Dashboard @endsection

@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h3> <i class="feather icon-layout text-primary font-medium-5"></i> &emsp14; <a href="{{route('thumbIndex')}}" class="mb-0" style="color:black;">Thumbnail</a></h3>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totalThumb())) Belum Ada Data Thumbnail @else Total : {{totalThumb()}} Thumbnail <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('thumbIndex')}}" type="button" class="btn btn-flat-primary round border-primary text-primary mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-layout text-primary font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h3> <i class="feather icon-users text-default font-medium-5"></i> &emsp14; <a href="{{route('supplierIndex')}}" class="mb-0" style="color:black;">Supplier</a></h3>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totalSupplier())) Tidak ada Data Supplier @else Total : {{totalsupplier()}} Supplier <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('supplierIndex')}}" type="button" class="btn btn-flat-secondary round border-black text-default mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-users text-default font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h3> <i class="feather icon-package text-warning font-medium-5"></i> &emsp14; <a href="{{route('barangIndex')}}" class="mb-0" style="color:black;">Barang</a></h3>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totalbarang())) Belum Ada Data Barang @else Total : {{totalbarang()}} Barang <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('barangIndex')}}" type="button" class="btn btn-flat-warning round border-warning text-warning mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-package text-warning font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h3> <i class="feather icon-users text-success font-medium-5"></i> &emsp14; <a href="{{route('userKaryawan')}}" class="mb-0" style="color:black;">Karyawan</a></h3>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totaluser())) Belum Ada Data Karyawan @else Total : {{totaluser()}} Karyawan <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('userKaryawan')}}" type="button" class="btn btn-flat-success round border-success text-success mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-users text-success font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h4> <i class="feather icon-package text-info font-medium-5"></i> &emsp14; <a href="{{route('datangIndex')}}" class="mb-0" style="color:black;">Barang Datang</a></h4>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totaldatang())) Belum Ada Data Barang Datang @else Total : {{totaldatang()}} Barang <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('datangIndex')}}" type="button" class="btn btn-flat-info round border-info  mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-package  font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h4> <i class="feather icon-package text-success font-medium-5"></i> &emsp14; <a href="{{route('terjualIndex')}}" class="mb-0" style="color:black;">Barang Terjual</a></h4>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totalterjual())) Belum Ada Data Barang Terjual @else Total : {{totalterjual()}} Barang <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('terjualIndex')}}" type="button" class="btn btn-flat-success round border-success  mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-package  font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h4> <i class="feather icon-package text-danger font-medium-5"></i> &emsp14; <a href="{{route('barangIndex')}}" class="mb-0" style="color:black;">Barang Diskon</a></h4>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totaldiskon())) Tidak Ada Barang Yang Diskon @else Total : {{totaldiskon()}} Barang <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('barangIndex')}}" type="button" class="btn btn-flat-danger round border-danger  mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-package  font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h4> <i class="feather icon-package text-warning font-medium-5"></i> &emsp14; <a href="{{route('garansiIndex')}}" class="mb-0" style="color:black;">Barang Garansi</a></h4>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totalgaransi())) Tidak Ada Data Barang Garansi @else Total : {{totalgaransi()}} Barang <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('garansiIndex')}}" type="button" class="btn btn-flat-warning round border-warning  mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-package  font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h4> <i class="feather icon-package text-default font-medium-5"></i> &emsp14; <a href="{{route('pengirimanIndex')}}" class="mb-0" style="color:black;">Pengiriman</a></h4>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totalpengiriman())) Tidak Ada Barang Pengiriman @else Total : {{totalpengiriman()}} Barang <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('pengirimanIndex')}}" type="button" class="btn btn-flat-secondary round border-black  mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-package  font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h4> <i class="feather icon-package text-warning font-medium-5"></i> &emsp14; <a href="{{route('rusakIndex')}}" class="mb-0" style="color:black;">Barang Rusak</a></h4>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totalrusak())) Tidak Ada Data Barang Rusak @else Total : {{totalrusak()}} Barang <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('rusakIndex')}}" type="button" class="btn btn-flat-warning round border-warning  mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-package  font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h5> <i class="feather icon-package text-info font-medium-5"></i> &emsp14; <a href="{{route('rusakIndex')}}" class="mb-0" style="color:black;">Proses Perbaikan</a></h5>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totalperbaikan())) <h6>Tidak Ada Data Barang Dalam Perbaikan </h6> @else Total : {{totalperbaikan()}} Barang <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('rusakIndex')}}" type="button" class="btn btn-flat-info round border-info  mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-package  font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar-content" style="margin-left:3px;">
                                    <h5> <i class="feather icon-package text-success font-medium-5"></i> &emsp14; <a href="{{route('rusakIndex')}}" class="mb-0" style="color:black;">Selesai Diperbaiki</a></h5>
                                </div>
                                <h5 class="text-bold-700 mt-1 mb-25">@if(empty(totalselesai())) <h6> Belum Ada Data Barang Selesai Perbaikan </h6> @else Total : {{totalselesai()}} Barang <br><br> @endif</h5>
                                <hr>
                                <a href="{{route('rusakIndex')}}" type="button" class="btn btn-flat-success round border-success  mr-1 mb-1 waves-effect waves-light" style="width: 100%;"> <i class="feather icon-package  font-medium-2"></i> Lihat Data</a>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection