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
                    <div class="col-md-8 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                    <div class="carousel-inner" style=" width:100%; max-height: 450px  !important;">
                                        <div class="carousel-item active">
                                            <img src="{{asset('images/index/2.jpg')}}" class="img-fluid d-block w-100" alt="cf-img-1" style=" width:100%; max-height: 450px !important;">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Judul</h5>
                                                <p>Keterangan</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('images/index/3.jpg')}}" class="img-fluid d-block w-100" alt="cf-img-2" style=" width:100%; max-height:  450px  !important;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('images/index/2.jpg')}}" class="img-fluid d-block w-100" alt="cf-img-3" style=" width:100%; max-height:  450px  !important;">
                                        </div>
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
                    <div class="col-xl-4 col-md-4 col-sm-12">
                        <div style="height: 550px;">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item">
                                        <img src="../../../app-assets/images/slider/01.jpg" class="card-img img-fluid mb-1" alt="First slide">
                                    </div>
                                    <div class="carousel-item active">
                                        <img src="../../../app-assets/images/slider/02.jpg" class="card-img img-fluid mb-1" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../../../app-assets/images/slider/03.jpg" class="card-img img-fluid mb-1" alt="Third slide">
                                    </div>
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
                                <div class="card-body">
                                    <h5>Vuexy Admin</h5>
                                    <p class="card-text">By Pixinvent Creative Studio</p>
                                    <hr>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="float-left">
                                            <p class="font-medium-2 mb-0">$ 4785.78</p>
                                            <p class="">Income</p>
                                        </div>
                                        <div class="float-right">
                                            <p class="font-medium-2 mb-0">12 June 2019</p>
                                            <p class="">Delivery Date</p>
                                        </div>
                                    </div>
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

            <div class="card-body">
                <div class="mt-4 mb-2 text-left">
                    <h2>Produk Terbaru</h2>
                </div>
                <div class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper" style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                        @foreach ($barang as $d)
                        <div class="swiper-slide rounded swiper-shadow" style="width: 253px; margin-right: 55px;">
                            <div class="item-heading">
                                <p class="text-truncate mb-0">
                                    {{$d->nama_barang}}
                                </p>
                                <p>
                                    <small>by</small>
                                    <small>Bowers &amp; Wilkins</small>
                                </p>
                            </div>
                            <div class="img-container w-50 mx-auto my-2 py-75">
                                <img src="../../../app-assets/images/elements/apple-watch.png" class="img-fluid" alt="image">
                            </div>
                            <div class="item-meta">
                                <p class="text-primary mt-1">$35.98</p>
                                <p class="text-secondary mt-1">Stok</p>
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

            <div class="card-body">
                <div class="mt-4 mb-2 text-left">
                    <h2>Produk Diskon</h2>
                </div>
                <div class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper" style="transform: translate3d(-1232px, 0px, 0px); transition-duration: 0ms;">
                        @foreach ($diskon as $d)
                        <div class="swiper-slide rounded swiper-shadow" style="width: 253px; margin-right: 55px;">
                            <div class="item-heading">
                                <p class="text-truncate mb-0">
                                    {{$d->nama_barang}}
                                </p>
                                <p>
                                    <small>by</small>
                                    <small>Bowers &amp; Wilkins</small>
                                </p>
                            </div>
                            <div class="img-container w-50 mx-auto my-2 py-75">
                                <img src="../../../app-assets/images/elements/apple-watch.png" class="img-fluid" alt="image">
                            </div>
                            <div class="item-meta">
                                <p class="text-primary mt-1">Rp.{{$d->harga_jual}},- / {{$d->diskon}}%</p>
                                <p>Rp.{{$d->harga_diskon}},-</p>
                                <p class="text-secondary mt-1">Stok</p>
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
    </div>
</div>
<!-- END: Content-->
@endsection

@section('script')

@endsection