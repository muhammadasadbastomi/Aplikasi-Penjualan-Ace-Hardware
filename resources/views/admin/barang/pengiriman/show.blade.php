@extends('layouts.admin.admin')

@section('content')

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
                                <li class="breadcrumb-item"><a href="#">Barang</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Show</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown">
                        <button
                            class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-light"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="feather icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a
                                class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a>
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
                                    <img src="../../../app-assets/images/elements/macbook-pro.png" class="img-fluid"
                                        alt="product image">
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
                                <p>Shoot professional photos and videos with this Canon EOS 5D Mk V 24-70mm lens kit. A
                                    huge 30.4-megapixel
                                    full-frame sensor delivers outstanding image clarity, and 4K video is possible from
                                    this DSLR for powerful
                                    films. Ultra-precise autofocus and huge ISO ranges give you the images you want from
                                    this Canon EOS 5D Mk V
                                    24-70mm lens kit.</p>
                                <p class="font-weight-bold mb-25"> <i
                                        class="feather icon-truck mr-50 font-medium-2"></i>Free Shipping
                                </p>
                                <p class="font-weight-bold"> <i
                                        class="feather icon-dollar-sign mr-50 font-medium-2"></i>EMI options available
                                </p>
                                <hr>
                                <p>Available - <span class="text-success">In stock</span></p>

                                <div class="d-flex flex-column flex-sm-row">
                                    <button
                                        class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light"><i
                                            class="feather icon-shopping-cart mr-25"></i>Edit</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <!-- app ecommerce details end -->

        </div>
    </div>
</div>

@endsection
