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
                                            <img src="/images/thumbnail/{{$d->gambar}}" class="img-fluid d-block w-100"
                                                alt="cf-img-1" style=" width:100%; height: 450px !important;">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5 style="color: black; "><b><strong>{{$d->judul}}</strong></b></h5>
                                                <p style="color: black; margin-bottom:-33px;">
                                                    <b><strong>{{$d->keterangan}}</strong></b></p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-12">
                        <div style="height: 550px;">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    @foreach($diskon as $d)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="/images/barang/{{$d->gambar}}" class="diskon card-img img-fluid mb-1"
                                            alt="slider" style="width:100%; height: 295px !important;">
                                        <div class="diskon badge badge-danger float-right">Diskon {{$d->diskon}}%</div>
                                        <div class="carousel-caption d-none d-md-block" style="margin-bottom: 90px;">
                                            <a class="text-dark"><strong>{{$d->nama_barang}}</strong></a><br>
                                            <a class="text-dark"><strong>Kategori : @if($d->kategori == 1)
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
                                                    @endif</strong></a><br>
                                            <a
                                                class="text-secondary"><strong><del>Rp.{{$d->harga_jual}},</del></strong></a><a
                                                class="text-danger"><strong>Rp.{{$d->harga_diskon}},-</strong></a>
                                        </div>
                                        <div class="kategori" style="margin-top:13px;">
                                            <h6>Departement : {{$d->departement}}</h6>
                                            <hr>
                                            <p>Supplier : {{$d->supplier->supplier}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" style="margin-top:-110px"
                                    href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" style="margin-top:-110px"
                                    href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="card-content" style="margin-top:5px">
                                <a href="{{route('homeShop')}}" type="button" style="width: 100%;"
                                    class="btn btn-relief-danger mr-1 mb-1 waves-effect waves-light"> <i
                                        class="feather icon-package"> Lihat Barang Lainnya</i> </a>
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
                            <img class="card-img img-fluid" src="#" alt="Card image">
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
        <div class="card-body" style="margin-top:-50px">
            <div class="mt-4 mb-2 text-left">
                <h2> Produk Terbaru <div class="badge badge-danger"> <strong> Latest </strong> </div>
                </h2>
            </div>
            <div
                class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper"
                    style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($barang as $d)
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
                            <img src="/images/resize/{{$d->gambar}}" class="img-fluid" alt="image">
                            @if($d->diskon != null && $d->tgl_mulai <= Carbon\Carbon::now()->format('Y-m-d') &&
                                $d->tgl_akhir >= Carbon\Carbon::now()->format('Y-m-d'))
                                <span class="diskon badge badge-danger text-white">{{$d->diskon}}%</span>
                                @else
                                <span style="opacity:0;">0</span>
                                @endif
                        </div>
                        <div class="item-meta" style="margin-top:-25px;">
                            @if($d->diskon != null && $d->tgl_mulai <= Carbon\Carbon::now()->format('Y-m-d') &&
                                $d->tgl_akhir >= Carbon\Carbon::now()->format('Y-m-d'))
                                <a class="text-secondary"><del>Rp.{{$d->harga_jual}},</del></a>
                                <a class="text-danger">Rp.{{$d->harga_diskon}},-</a>
                                @else
                                <a class="text-danger">Rp. {{$d->harga_jual}},-</a>
                                @endif
                                <br>
                                <a>Departement : {{$d->departement}}</a> <br>
                                <a>Supplier : {{$d->supplier->supplier}}</a> <br>
                                <p>Stok Tersedia : {{$d->stok_tersedia}}</p>
                                <a href="{{route('homeShow', ['id' => $d->uuid])}}" type="button" style="width: 100%;"
                                    class="btn btn-relief-primary mr-1 mb-1 waves-effect waves-light"> <i
                                        class="fas fa fa-search"> Lihat Detail</i> </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button"
                    aria-label="Next slide" aria-disabled="true"></div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                    aria-disabled="false"></div>

                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <!---- End Terbaru ----->
        <!---- Produk Diskon ----->
        <div class="card-body" style="margin-top:-50px">
            <div class="mt-4 mb-2 text-left">
                <h2>Produk Diskon <div class="badge badge-danger"><strong> Diskon % </strong></div>
                </h2>
            </div>
            <div
                class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper"
                    style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($diskon as $d)
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
                            <img src="/images/resize/{{$d->gambar}}" class="img-fluid" alt="image">
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
                            <a>Departement : {{$d->departement}}</a> <br>
                            <a>Supplier : {{$d->supplier->supplier}}</a> <br>
                            <p>Stok Tersedia : {{$d->stok_tersedia}}</p>
                            <a href="{{route('homeShow', ['id' => $d->uuid])}}" type="button" style="width: 100%;"
                                class="btn btn-relief-primary mr-1 mb-1 waves-effect waves-light"> <i
                                    class="fas fa fa-search"> Lihat Detail</i> </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button"
                    aria-label="Next slide" aria-disabled="true"></div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                    aria-disabled="false"></div>

                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <!---- End Diskon ----->
        <!---- Prodak Terlaris ----->
        <div class="card-body" style="margin-top:-50px">
            <div class="mt-4 mb-2 text-left">
                <h2>Produk Terlaris <div class="badge badge-danger"><strong> Popular </strong></div>
                </h2>
            </div>
            <div
                class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper"
                    style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($terlaris as $d)
                    <div class="swiper-slide rounded swiper-shadow" style="width: 253px; margin-right: 55px;">
                        <div class="item-heading">
                            <a href=" {{route('homeShow', ['id' => $d->uuid])}}" class="text-truncate mb-0">
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
                        <div class="img-container my-1">
                            <img src="/images/resize/{{$d->barang->gambar}}" class="img-fluid" alt="image">
                            @if($d->barang->diskon != null && $d->tgl_mulai <= Carbon\Carbon::now()->format('Y-m-d') &&
                                $d->tgl_akhir >= Carbon\Carbon::now()->format('Y-m-d'))
                                <span class="diskon badge badge-danger text-white">{{$d->diskon}}%</span>
                                @else
                                <span style="opacity:0;">0</span>
                                @endif
                        </div>
                        <div class="item-meta" style="margin-top:-25px;">
                            @if($d->barang->diskon != null && $d->tgl_mulai <= Carbon\Carbon::now()->format('Y-m-d') &&
                                $d->tgl_akhir >= Carbon\Carbon::now()->format('Y-m-d'))
                                <a class="text-secondary"><del>Rp.{{$d->harga_jual}},</del></a>
                                <a class="text-danger">Rp.{{$d->harga_diskon}},-</a>
                                @else
                                <a class="text-danger">Rp. {{$d->harga_jual}},-</a>
                                @endif
                                <br>
                                <a>Departement : {{$d->barang->departement}}</a> <br>
                                <a>Supplier : {{$d->barang->supplier->supplier}}</a> <br>
                                <p>Stok Tersedia : {{$d->barang->stok_tersedia}}</p>
                                <a href="{{route('homeShow', ['id' => $d->uuid])}}" type="button" style="width: 100%;"
                                    class="btn btn-relief-primary mr-1 mb-1 waves-effect waves-light"> <i
                                        class="fas fa fa-search"> Lihat Detail</i> </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button"
                    aria-label="Next slide" aria-disabled="true"></div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                    aria-disabled="false"></div>

                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <!---- End Terlaris ----->
        <!---- Produk Termurah ----->
        <div class="card-body" style="margin-top:-50px">
            <div class="mt-4 mb-2 text-left">
                <h2>Produk Termurah <div class="badge badge-danger"><strong> Lowest Price </strong></div>
                </h2>
            </div>
            <div
                class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper"
                    style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($termurah as $d)
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
                            <img src="/images/resize/{{$d->gambar}}" class="img-fluid" alt="image">
                            @if($d->diskon != null && $d->tgl_mulai <= Carbon\Carbon::now()->format('Y-m-d') &&
                                $d->tgl_akhir >= Carbon\Carbon::now()->format('Y-m-d'))
                                <span class="diskon badge badge-danger text-white">{{$d->diskon}}%</span>
                                @else
                                <span style="opacity:0;">0</span>
                                @endif
                        </div>
                        <div class="item-meta" style="margin-top:-25px;">
                            @if($d->diskon != null && $d->tgl_mulai <= Carbon\Carbon::now()->format('Y-m-d') &&
                                $d->tgl_akhir >= Carbon\Carbon::now()->format('Y-m-d'))
                                <a class="text-secondary"><del>Rp.{{$d->harga_jual}},</del></a>
                                <a class="text-danger">Rp.{{$d->harga_diskon}},-</a>
                                @else
                                <a class="text-danger">Rp. {{$d->harga_jual}},-</a>
                                @endif
                                <br>
                                <a>Departement : {{$d->departement}}</a> <br>
                                <a>Supplier : {{$d->supplier->supplier}}</a> <br>
                                <p>Stok Tersedia : {{$d->stok_tersedia}}</p>
                                <a href="{{route('homeShow', ['id' => $d->uuid])}}" type="button" style="width: 100%;"
                                    class="btn btn-relief-primary mr-1 mb-1 waves-effect waves-light"> <i
                                        class="fas fa fa-search"> Lihat Detail</i> </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button"
                    aria-label="Next slide" aria-disabled="true"></div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                    aria-disabled="false"></div>

                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <!---- End Murah ----->
        <br>
    </div>
</div>
</div>
<!-- END: Content-->

<div class="modal fade text-left" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('homeStore') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="barang">Pilih Barang</label>
                            <select class="custom-select" name="barang_id" id="barang_id">
                                @foreach($baranglist as $l)
                                <option value="{{$l->id}}">{{ $l->nama_barang}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Jumlah Order</label>
                        <div class="form-group">
                            <input type="number" name="jumlah_order" id="jumlah_order" placeholder="Masukkan Jumlah"
                                value="{{old('jumlah_order')}}"
                                class="form-control  @error ('jumlah_order') is-invalid @enderror">
                            @error('jumlah_order')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>Nama</label>
                        <div class="form-group">
                            <input type="text" name="nama_order" id="nama_order" placeholder="Masukkan nama"
                                value="{{old('nama_order')}}"
                                class="form-control  @error ('nama_order') is-invalid @enderror">
                            @error('nama_order')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>Alamat</label>
                        <div class="form-group">
                            <input type="text" name="alamat_order" id="alamat_order" placeholder="Masukkan alamat"
                                value="{{old('alamat_order')}}"
                                class="form-control  @error ('alamat_order') is-invalid @enderror">
                            @error('alamat_order')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>Nomor telepon</label>
                        <div class="form-group">
                            <input type="number" name="telp_order" id="telp_order" placeholder="Masukkan telepon"
                                value="{{old('telp_order')}}"
                                class="form-control  @error ('telp_order') is-invalid @enderror">
                            @error('telp_order')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>email</label>
                        <div class="form-group">
                            <input type="text" name="email_order" id="email_order" placeholder="Masukkan email"
                                value="{{old('email_order')}}"
                                class="form-control  @error ('email_order') is-invalid @enderror">
                            @error('email_order')<div class="invalid-feedback"> {{$message}} </div>@enderror
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

@endsection
