@extends('layouts/home/home')

@section('title') Ace Hardware @endsection
@section('head')
<style>
    img.diskon {
        position: relative;
        z-index: 1;
    }

    div.diskon {
        position: relative;
        top: -300px;
        right: 3%;
        z-index: 2;
        font-weight: bold;
    }

    span.diskon {
        position: relative;
        top: -200px;
        left: 80px;
        border-radius: 100%;
        z-index: 2;
        font-weight: bold;
    }

    div.kategori {
        position: relative;
        left: 10px;
        z-index: 2;
    }
</style>
@endsection
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
                                <li class="breadcrumb-item"><a href="{{route('homeIndex')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('homeShop')}}">Shop</a>
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
                                <h3><strong>{{$barang->nama_barang}}</strong></h3>
                                <p class="text-muted"><b>Kategori : @if($barang->kategori == 1)
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
                                        @endif </b></p>
                                <p> <b>Departement : {{$barang->departement}} </b></p>
                                <p> <b>Supplier : {{$barang->supplier->supplier}} </b></p>
                                <div class="ecommerce-details-price d-flex flex-wrap">
                                    <h6 class="item-price">
                                        @if($barang->diskon != null)
                                        <p class="font-medium-3 mr-1 mb-0" style="color: black;margin-bottom:0px;"><strong style="color: red"> Diskon {{$barang->diskon}}%</strong></p>
                                        <br>
                                        <p class="font-medium-3 mr-1 mb-0" style="color: black; margin-bottom:-5px;"> Harga : <del class="text-secondary">Rp. {{$barang->harga_jual}},-</del>&emsp14;<b>Rp. {{$barang->harga_diskon }},-</b> </p>
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


                    <div class="card-body" style="margin-top:-50px">
                        <div class="mt-4 mb-2 text-left">
                            <h2>Produk Terkait <div class="badge badge-danger"><strong> Related </strong></div>
                            </h2>
                        </div>
                        <div class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                            <div class="swiper-wrapper" style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                                @foreach ($terkait as $d)
                                <div class="swiper-slide rounded swiper-shadow" style="width: 253px; margin-right: 55px;">
                                    <div class="item-heading">
                                        <a href=" {{route('homeShow', ['id' => $d->uuid])}}" class="text-truncate mb-0">
                                            {{$d->nama_barang}}
                                        </a>
                                        <p>
                                            <small> @if($d->kategori == 1)
                                                Peralatan Rumah
                                                @elseif($d->kategori == 2)
                                                Alat Kebersihan
                                                @elseif($d->kategori == 3)
                                                Alat Dapur
                                                @elseif($d->kategori == 4)
                                                Otomotif
                                                @elseif($d->kategori == 5)
                                                Peralatan Elektronik
                                                @elseif($d->kategori == 6)
                                                Olahraga & Outdoor
                                                @elseif($d->kategori == 7)
                                                Kategori Lainnya
                                                @else
                                                -
                                                @endif</small>
                                        </p>
                                    </div>
                                    <div class="img-container my-1">
                                        <img src="/images/barang/{{$d->gambar}}" class="img-fluid" alt="image">
                                        @if($d->diskon != null)
                                        <span class="diskon badge badge-danger text-white">{{$d->diskon}}%</span>
                                        @else
                                        <span style="opacity:0;">0</span>
                                        @endif
                                    </div>
                                    <div class="item-meta" style="margin-top:-25px;">
                                        @if($d->diskon != null)
                                        <a class="text-secondary"><del>Rp.{{$d->harga_jual}},</del></a>
                                        <a class="text-danger">Rp.{{$d->harga_diskon}},-</a>
                                        @else
                                        <a class="text-danger">Rp. {{$d->harga_jual}},-</a>
                                        @endif
                                        <br>
                                        <a>Supplier : {{$d->supplier->supplier}}</a> <br>
                                        <a>Departement : {{$d->departement}}</a> <br>
                                        <p>Stok Tersedia : {{$d->stok_tersedia}}</p>
                                        <a href="{{route('homeShow', ['id' => $d->uuid])}}" type="button" style="width: 100%;" class="btn btn-relief-primary mr-1 mb-1 waves-effect waves-light"> <i class="fas fa fa-search"> Lihat Detail</i> </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button" aria-label="Next slide" aria-disabled="true"></div>
                            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>

                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
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