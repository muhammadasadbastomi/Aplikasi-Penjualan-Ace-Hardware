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
                        <h2 class="content-header-title float-left mb-0">Product Details</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="app-ecommerce-shop.html">Shop</a>
                                </li>
                                <li class="breadcrumb-item active">Details
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
                            <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="../../../app-assets/images/elements/macbook-pro.png" class="img-fluid" alt="product image">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5>Canon - EOS 5D Mark IV DSLR Camera with 24-70mm f/4L IS USM Lens
                                </h5>
                                <p class="text-muted">by Apple</p>
                                <div class="ecommerce-details-price d-flex flex-wrap">

                                    <p class="text-primary font-medium-3 mr-1 mb-0">$43.99</p>
                                    <span class="pl-1 font-medium-3 border-left">
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-secondary"></i>
                                    </span>
                                    <span class="ml-50 text-dark font-medium-1">424 ratings</span>
                                </div>
                                <hr>
                                <p>Shoot professional photos and videos with this Canon EOS 5D Mk V 24-70mm lens kit. A huge 30.4-megapixel
                                    full-frame sensor delivers outstanding image clarity, and 4K video is possible from this DSLR for powerful
                                    films. Ultra-precise autofocus and huge ISO ranges give you the images you want from this Canon EOS 5D Mk V
                                    24-70mm lens kit.</p>
                                <p class="font-weight-bold mb-25"> <i class="feather icon-truck mr-50 font-medium-2"></i>Free Shipping
                                </p>
                                <p class="font-weight-bold"> <i class="feather icon-dollar-sign mr-50 font-medium-2"></i>EMI options available
                                </p>
                                <hr>
                                <p>Available - <span class="text-success">In stock</span></p>
                                <div class="d-flex flex-column flex-sm-row">
                                    <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"><i class="feather icon-shopping-cart mr-25"></i>ADD TO CART</button>
                                    <button class="btn btn-outline-danger"><i class="feather icon-heart mr-25"></i>WISHLIST</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 mb-2 text-center">
                            <h2>RELATED PRODUCTS</h2>
                            <p>People also search for this items</p>
                        </div>
                        <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Bowers Wilkins - CM10 S2 Triple 6-1/2" 3-Way Floorstanding Speaker (Each) - Gloss Black
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Bowers & Wilkins</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="../../../app-assets/images/elements/apple-watch.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$19.98</p>
                                    </div>
                                </div>
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Alienware - 17.3" Laptop - Intel Core i7 - 16GB Memory - NVIDIA GeForce GTX 1070 - 1TB Hard Drive +
                                            128GB Solid State Drive - Silver
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Alienware</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="../../../app-assets/images/elements/beats-headphones.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$35.98</p>
                                    </div>
                                </div>
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Canon - EOS 5D Mark IV DSLR Camera with 24-70mm f/4L IS USM Lens
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Canon</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-3 py-50">
                                        <img src="../../../app-assets/images/elements/macbook-pro.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$49.98</p>
                                    </div>
                                </div>
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Apple - 27" iMac with Retina 5K display - Intel Core i7 - 32GB Memory - 2TB Fusion Drive - Silver
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Apple</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="../../../app-assets/images/elements/homepod.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$29.98</p>
                                    </div>
                                </div>
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Bowers Wilkins - CM10 S2 Triple 6-1/2" 3-Way Floorstanding Speaker (Each) - Gloss Black
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Bowers & Wilkins</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="../../../app-assets/images/elements/magic-mouse.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$99.98</p>
                                    </div>
                                </div>
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Garmin - fenix 3 Sapphire GPS Watch - Silver
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Garmin</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="../../../app-assets/images/elements/iphone-x.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$59.98</p>
                                    </div>
                                </div>
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