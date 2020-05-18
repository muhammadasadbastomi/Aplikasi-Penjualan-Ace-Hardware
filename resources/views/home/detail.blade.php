@extends('layouts/home/home')

@section('title') Ace Hardware @endsection

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
                        <h2 class="content-header-title float-left mb-0">Produk Detail</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="app-ecommerce-shop.html">Shop</a>
                                </li>
                                <li class="breadcrumb-item active">Detail
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- app ecommerce details start -->
            <section class="app-ecommerce-details">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5 mt-2">
                            <div class="col-12 col-md-4 d-flex align-items-center justify-content-center mb-2 mb-md-0" style="margin-left: 27px;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="/images/barang/{{$barang->gambar}}" class="img-fluid" alt="product image" style="width: 100%; height:100%;">
                                </div>
                            </div>
                            <div style="margin-left: 40px;" class="col-12 col-md-7 float-left">
                                <div class="row mb-3 mt-0 col-sm-3 float-right">
                                    <img src="/img/logo.png" class="img-fluid" alt="product image">
                                </div>
                                <h3>{{$barang->nama_barang}}
                                </h3>
                                <p class="text-muted">Kategori : @if($barang->kategori == 1)
                                    Peralatan Rumah
                                    @elseif($barang->kategori == 2)
                                    Alat Kebersihan
                                    @elseif($barang->kategori == 3)
                                    Alat Dapur
                                    @elseif($barang->kategori == 4)
                                    Otomotif
                                    @elseif($barang->kategori == 5)
                                    Peralatan Elektronik
                                    @elseif($barang->kategori == 6)
                                    Olahraga & Outdoor
                                    @elseif($barang->kategori == 7)
                                    Kategori Lainnya
                                    @else
                                    -
                                    @endif</p>
                                <div class="ecommerce-details-price d-flex flex-wrap">
                                    <h6 class="item-price">
                                        @if($barang->diskon != null)
                                        <p class="font-medium-3 mr-1 mb-0" style="color: black;margin-bottom:0px;"><strong style="color: red"> Diskon {{$barang->diskon}}%</strong> / <del>Rp. {{$barang->harga_jual}},-</del></p>
                                        <br>
                                        <p class="font-medium-3 mr-1 mb-0" style="color: black; margin-bottom:-5px;"> Harga : <b>Rp. {{$barang->harga_diskon }},-</b> </p>
                                    </h6>
                                    @else
                                    <p class="font-medium-3 mr-1 mb-0" style="color: black; margin-bottom:-5px;"> Harga : <b>Rp. {{$barang->harga_jual}},-</b> </p>
                                    <br>
                                    @endif
                                </div>
                                <hr>
                                <div class="float-left">
                                    <p> Deskripsi : </p>
                                </div>
                                <div class="float-right">
                                    <p>Stok Tersedia - <span class="text-success"><b> {{$barang->stok_tersedia}}</b></span></p>
                                </div>
                                <div class="float-left col-sm-12 col-12 col-md-12"><br>
                                    <p>{{$barang->keterangan}}</p>
                                </div>
                                <br>
                                <!-- <div class="d-flex flex-column flex-sm-row">
                                    <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"><i class="feather icon-shopping-cart mr-25"></i>ADD TO CART</button>
                                    <button class="btn btn-outline-danger"><i class="feather icon-heart mr-25"></i>WISHLIST</button>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="text-left" style="padding:30px;">
                            <h4>Produk Terkait</h4>
                        </div>
                        <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                            <div class="swiper-wrapper">
                                @foreach ($terkait as $d)
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            {{$d->nama_barang}}
                                        </p>
                                        <p>
                                            <small> @if($barang->kategori == 1)
                                                Peralatan Rumah
                                                @elseif($barang->kategori == 2)
                                                Alat Kebersihan
                                                @elseif($barang->kategori == 3)
                                                Alat Dapur
                                                @elseif($barang->kategori == 4)
                                                Otomotif
                                                @elseif($barang->kategori == 5)
                                                Peralatan Elektronik
                                                @elseif($barang->kategori == 6)
                                                Olahraga & Outdoor
                                                @elseif($barang->kategori == 7)
                                                Kategori Lainnya
                                                @else
                                                -
                                                @endif</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="/images/barang/{{$d->gambar}}" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <h6 class="item-price">
                                            @if($d->diskon != null)
                                            <p style="color: black;margin-bottom:0px;"><del>Rp. {{$d->harga_jual}},-</del> / <strong style="color: red">{{$d->diskon}}%</strong></p>
                                            <p style="color: black; margin-bottom:-5px;"> <b>Rp. {{$d->harga_diskon}},-</b> </p>
                                        </h6>
                                        @else
                                        <h6>Rp. {{$d->harga_jual}},-</h6>
                                        <!-- <h6 class="text-white">-</h6> -->
                                        <br>
                                        @endif
                                        <p class="text-secondary mt-1">Stok Tersedia : {{$d->stok_tersedia}}</p>
                                        <a href="{{route('homeShow', ['id' => $d->uuid])}}" type="button" style="width: 100%;" class="btn btn-relief-primary mr-1 mb-1 waves-effect waves-light"> <i class="fas fa fa-search"> Lihat Detail</i> </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- app ecommerce details end -->

        </div>
    </div>
</div>
<!-- END: Content-->


@endsection

@section('script')

@endsection