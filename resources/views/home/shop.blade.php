@extends('layouts/home/home')

@section('title') Ace Hardware @endsection

@section('head')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/nouislider.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/ui/prism.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
<!-- END: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/noui-slider.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-ecommerce-shop.css">
@endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-detached content-right">
            <div class="content-body">
                <!-- Ecommerce Search Bar Starts -->
                <section id="ecommerce-searchbar">
                    <div class="row mt-1">
                        <div class="col-sm-12">
                            <fieldset class="form-group position-relative">
                                <input type="text" class="form-control search-product" id="search" placeholder="Search here">
                                <div class="form-control-position">
                                    <i class="feather icon-search"></i>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </section>
                <!-- Ecommerce Search Bar Ends -->

                <!-- Ecommerce Products Starts -->
                <section id="ecommerce-products" class="grid-view">
                    @foreach($barang as $d)
                    <div class="card ecommerce-card">
                        <div class="card-content">
                            <div class="item-img text-center">
                                <a href="app-ecommerce-details.html">
                                    <img class="img-fluid" src="{{$d->gambar()}}" alt="img-placeholder"></a>
                            </div>
                            <div class="card-body">
                                <div class="item-wrapper">
                                    <div>
                                        <h6 class="item-price">
                                            @if($d->diskon != null)
                                            <h6><del>Rp. {{$d->harga_jual}},-</del> / <strong style="color: red">{{$d->diskon}}%</strong></h6>
                                            <h6>Rp. {{$d->harga_diskon}},-</h6>
                                        </h6>
                                        @else
                                        <h6>Rp. {{$d->harga_jual}},-</h6>
                                        <!-- <h6 class="text-white">-</h6> -->
                                        <br>
                                        @endif
                                    </div>
                                    <div class="item-rating">
                                        <a type="button" class="btn btn-primary btn-sm" href="{{route('homeShow', ['id' => $d->uuid])}}"> <i class="fas fa fa-search"> Detail</i></a>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a href="{{route('homeShow', ['id' => $d->uuid])}}">{{$d->nama_barang}}</a>
                                    <p class="item-company">By <span class="company-name">Google</span></p>
                                </div>
                                <div>
                                    <p class="item-description">
                                        Enjoy smart access to videos, games and apps with this Amazon Fire TV stick.
                                        Its Alexa voice remote lets you
                                        deliver hands-free commands when you want to watch television or engage with
                                        other applications. With a
                                        quad-core processor, 1GB internal memory and 8GB of storage, this portable
                                        Amazon Fire TV stick works fast
                                        for buffer-free streaming.
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="item-options text-center">
                                <div class="item-wrapper">
                                    <div class="item-cost">
                                        <h6 class="item-price">
                                            $39.99
                                        </h6>
                                    </div>
                                </div>
                                <div class="wishlist">
                                    <i class="fa fa-heart-o"></i> <span>Wishlist</span>
                                </div>
                                <div class="cart">
                                    <i class="feather icon-shopping-cart"></i> <span class="add-to-cart">Add to
                                        cart</span> <a href="app-ecommerce-checkout.html" class="view-in-cart d-none">View In Cart</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    @endforeach
                </section>

                <!-- Ecommerce Products Ends -->

                <!-- Ecommerce Pagination Starts -->
                <section id="ecommerce-pagination">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-2">
                                    <li class="page-item prev-item"><a class="page-link" href="{{$data->previousPageUrl()}}"></a></li>
                                    {{$data->links()}}
                                    <li class="page-item next-item"><a class="page-link" href="{{$data->nextPageUrl()}}"></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
                <!-- Ecommerce Pagination Ends -->

            </div>
        </div>
        <div class="sidebar-detached sidebar-left">
            <div class="sidebar">
                <!-- Ecommerce Sidebar Starts -->
                <div class="sidebar-shop" id="ecommerce-sidebar-toggler" style="margin-top:13px;">
                    <div class="card">
                        <div class="card-body">
                            <div class="multi-range-price">
                                <div class="multi-range-title pb-75">
                                    <h6 class="filter-title mb-0">Multi Range</h6>
                                </div>
                                <ul class="list-unstyled price-range" id="price-range">
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="price-range" checked value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">All</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="price-range" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Kurang dari Rp. 10.000</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="price-range" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Rp. 10.000 - Rp. 100.000</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="price-range" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Rp. 100.000 - Rp. 500.000</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="price-range" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Lebih Dari Rp. 500.000</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Price Filter -->
                            <hr>
                            <!-- Categories Starts -->
                            <div id="product-categories">
                                <div class="product-category-title">
                                    <h6 class="filter-title mb-1">Categories</h6>
                                </div>
                                <ul class="list-unstyled categories-list">
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false" checked>
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Alat Rumah</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50"> Alat Kebersihan</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Dapur</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Otomotif</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Peralatan Eletronik</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Olahraga & Outdoor</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50"> Lain-Lain</span>
                                        </span>
                                </ul>
                            </div>
                            <!-- Categories Ends -->
                            <hr>
                            <!-- Clear Filters Starts -->
                            <div id="clear-filters">
                                <button class="btn btn-block btn-primary">Cari Filter</button>
                                <button class="btn btn-block btn-primary">Cancel Filter</button>
                            </div>
                            <!-- Clear Filters Ends -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <!-- Rating section starts -->
                            <div id="ratings">
                                <div class="ratings-title mt-1 pb-75">
                                    <h6 class="filter-title mb-0">Produk Terlaris <div class="badge badge-danger float-right">Popular</div>
                                    </h6>
                                </div>
                                @foreach ($terlaris as $d)
                                <div class="d-flex justify-content-between">
                                    <ul class="unstyled-list list-inline ratings-list mb-0">
                                        <li>
                                            <a>{{$d->nama_barang}}</a>
                                        </li>
                                    </ul>
                                    <div class="stars-received float-right col-sm-6"> Rp. {{$d->harga_jual}},-</div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Rating section Ends -->
                        </div>
                    </div>
                </div>
                <!-- Ecommerce Sidebar Ends -->

            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('script')
<script src="../../../app-assets/vendors/js/ui/prism.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/wNumb.js"></script>
<script src="../../../app-assets/vendors/js/extensions/nouislider.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- BEGIN: Page JS-->
<script src="../../../app-assets/js/scripts/pages/app-ecommerce-shop.js"></script>
<!-- END: Page JS-->
@endsection