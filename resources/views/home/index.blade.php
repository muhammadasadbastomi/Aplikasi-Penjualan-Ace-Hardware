@extends('layouts/home/home')

@section('title') Ace Hardware @endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- CrossFade Carousel Start -->
            <section id="carousel-crossfade">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($thumb as $d)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <img src="/images/thumbnail/{{$d->gambar}}" class="img-fluid d-block w-100" alt="cf-img-1" style=" width:100%; height: 450px !important;">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5 style="color: black"><b><strong>{{$d->judul}}</strong></b></h5>
                                                <p style="color: black; margin-bottom:-33px;"><b><strong>{{$d->keterangan}}</strong></b></p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-12">
                        <div style="height: 550px;">

                            <div class="badge badge-danger float-right">Diskon %</div>
                            <div class="float-left">
                                <h5>Ace Hardware</h5>
                            </div>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($thumb as $d)
                                    <li data-target="#carousel-example-generic" data-slide-to="{{$d->id}}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach($diskon as $d)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="/images/barang/{{$d->gambar}}" class="card-img img-fluid mb-1" alt="slider" style=" width:100%; height: 265px !important;">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a href="#" style="color: black">{{$d->nama_barang}}</a>
                                            <p style="color: black;margin-bottom:0px;"><del>Rp. {{$d->harga_jual}},-</del> / <strong style="color: red">{{$d->diskon}}%</strong></p>
                                            <p style="color: black; margin-bottom:-5px;"> <b>Rp. {{$d->harga_diskon}},-</b> </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="card-content">
                                <div class="card-body" style="max-height: 106px;">
                                    <h5>Ace Hardware Barang Diskon </h5>
                                    <p class="card-text">Kategori : Random</p>
                                    <hr>
                                </div>
                                <a href="{{route('homeShop')}}" type="button" style="width: 100%;" class="btn btn-relief-danger mr-1 mb-1 waves-effect waves-light"> <i class="feather icon-package"> Lihat Barang Lainnya</i> </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <!-- CrossFade Carousel End -->

        <!---- Start ----->
        <!-- <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img img-fluid" src="../../../app-assets/images/slider/04.jpg" alt="Card image">
                            <div class="card-img-overlay overflow-hidden overlay-danger overlay-lighten-2">
                                <h4 class="card-title text-white">Card Image Overlay</h4>
                                <p class="card-text text-white">Sugar plum tiramisu sweet. Cake jelly marshmallow cotton candy chupa chups.
                                </p>
                                <p class="card-text"><small class="text-white">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card text-white border-0 box-shadow-0">
                        <div class="card-content">
                            <img class="card-img img-fluid" src="{{asset('images/index/5.jpg')}}" alt="Card image">
                            <div class="card-img-overlay overflow-hidden overlay-success">
                                <h4 class="card-title text-white">Card Image Overlay</h4>
                                <p class="card-text text-white">Sugar plum tiramisu sweet. Cake jelly marshmallow cotton candy chupa chups.
                                </p>
                                <p class="card-text text-white"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img img-fluid" src="../../../app-assets/images/slider/04.jpg" alt="Card image">
                            <div class="card-img-overlay overflow-hidden overlay-warning">
                                <h4 class="card-title text-white">Card Image Overlay</h4>
                                <p class="card-text text-white">Sugar plum tiramisu sweet. Cake jelly marshmallow cotton candy chupa chups.
                                </p>
                                <p class="card-text"><small class="text-white">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card text-white border-0 box-shadow-0">
                        <div class="card-content">
                            <img class="card-img img-fluid" src="../../../app-assets/images/slider/04.jpg" alt="Card image">
                            <div class="card-img-overlay overflow-hidden overlay-info">
                                <h4 class="card-title text-white">Card Image Overlay</h4>
                                <p class="card-text text-white">Sugar plum tiramisu sweet. Cake jelly marshmallow cotton candy chupa chups.
                                </p>
                                <p class="card-text text-white"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <!----end--->
        <hr>
        <!---- Produk Terbaru ----->
        <div class="card-body">
            <div class="mt-4 mb-2 text-left">
                <h2>Produk Terbaru <div class="badge badge-danger">Latest</div>
                </h2>
            </div>
            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($barang as $d)
                    <div class="swiper-slide rounded swiper-shadow" style="width: 253px; margin-right: 55px;">
                        <div class="item-heading">
                            <a href="{{route('homeShow', ['id' => $d->uuid])}}" class="text-truncate mb-0">
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
                        <div class=" img-container w-80 mx-auto my-2 py-75">
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
                <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button" aria-label="Next slide" aria-disabled="true"></div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>

                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <!---- End Terbaru ----->
        <!---- Produk Diskon ----->
        <div class="card-body">
            <div class="mt-4 mb-2 text-left">
                <h2>Produk Diskon <div class="badge badge-danger">Diskon %</div>
                </h2>
            </div>
            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($diskon as $d)
                    <div class="swiper-slide rounded swiper-shadow" style="width: 253px; margin-right: 55px;">
                        <div class="item-heading">
                            <a href="{{route('homeShow', ['id' => $d->uuid])}}" class="text-truncate mb-0">
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
                        <div class=" img-container w-80 mx-auto my-2 py-75">
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
                <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button" aria-label="Next slide" aria-disabled="true"></div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>

                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <!---- End Diskon ----->
        <!---- Prodak Terlaris ----->
        <div class="card-body">
            <div class="mt-4 mb-2 text-left">
                <h2>Produk Terlaris <div class="badge badge-danger">Popular</div>
                </h2>
            </div>
            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($terlaris as $d)
                    <div class="swiper-slide rounded swiper-shadow" style="width: 253px; margin-right: 55px;">
                        <div class="item-heading">
                            <a href="{{route('homeShow', ['id' => $d->uuid])}}" class="text-truncate mb-0">
                                {{$d->barang->nama_barang}}
                            </a>
                            <p>
                                <small> @if($d->barang->kategori == 1)
                                    Peralatan Rumah
                                    @elseif($d->barang->kategori == 2)
                                    Alat Kebersihan
                                    @elseif($d->barang->kategori == 3)
                                    Alat Dapur
                                    @elseif($d->barang->kategori == 4)
                                    Otomotif
                                    @elseif($d->barang->kategori == 5)
                                    Peralatan Elektronik
                                    @elseif($d->barang->kategori == 6)
                                    Olahraga & Outdoor
                                    @elseif($d->barang->kategori == 7)
                                    Kategori Lainnya
                                    @else
                                    -
                                    @endif</small>
                            </p>
                        </div>
                        <div class=" img-container w-80 mx-auto my-2 py-75">
                            <img src="/images/barang/{{$d->barang->gambar}}" class="img-fluid" alt="image">
                        </div>
                        <div class="item-meta">
                            <h6 class="item-price">
                                @if($d->barang->diskon != null)
                                <p style="color: black;margin-bottom:0px;"><del>Rp. {{$d->harga_jual}},-</del> / <strong style="color: red">{{$d->barang->diskon}}%</strong></p>
                                <p style="color: black; margin-bottom:-5px;"> <b>Rp. {{$d->harga_diskon}},-</b> </p>
                            </h6>
                            @else
                            <h6>Rp. {{$d->harga_jual}},-</h6>
                            <!-- <h6 class="text-white">-</h6> -->
                            <br>
                            @endif
                            <p class="text-secondary mt-1">Stok Tersedia : {{$d->barang->stok_tersedia}}</p>
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
        <!---- End Terlaris ----->
        <!---- Produk Termurah ----->
        <div class="card-body">
            <div class="mt-4 mb-2 text-left">
                <h2>Produk Termurah <div class="badge badge-danger">Lowest Price</div>
                </h2>
            </div>
            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($termurah as $d)
                    <div class="swiper-slide rounded swiper-shadow" style="width: 253px; margin-right: 55px;">
                        <div class="item-heading">
                            <a href="{{route('homeShow', ['id' => $d->uuid])}}" class="text-truncate mb-0">
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
                        <div class=" img-container w-80 mx-auto my-2 py-75">
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
                <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button" aria-label="Next slide" aria-disabled="true"></div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>

                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <!---- End Murah ----->
        <br>
    </div>
</div>
</div>
<!-- END: Content-->
@endsection

@section('script')

@endsection