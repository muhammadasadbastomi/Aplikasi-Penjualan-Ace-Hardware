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
<style>
    div.badge-diskon:before,
    div.badge-diskon:after {
        content: attr(diskon) "% Off";
        width: 41px;
        height: 44px;
        font-size: 15px;
        position: absolute;
        right: 5px;
        top: 5px;
        background-color: yellow;
        font-weight: bold;
        text-align: center;
        letter-spacing: 0.1em;
        border-radius: 10px 0px 10px 0px;
    }

    div.badge-diskon:before,
    div.badge-diskon:after {
        transition: all .3s;
    }

    div.badge-diskon:after {
        background-color: #d34836;
        color: #FFFFFF;
        opacity: 0;
        filter: alpha(opacity=0);
        -webkit-transform: translateY(33px) rotateX(-90deg);
        transform: translateY(33px) rotateX(-90deg);
    }

    div.badge-diskon:hover:before {
        opacity: 0;
        filter: alpha(opacity=0);
        -webkit-transform: translateY(-33px) rotateX(90deg);
        transform: translateY(-33px) rotateX(90deg);
    }

    div.badge-diskon:hover:after {
        opacity: 1;
        filter: alpha(opacity=100);
        -webkit-transform: rotateX(0);
        transform: rotateX(0);
    }
</style>
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
                                <form action="/home/shop" method="GET">
                                    <input type="text" class="form-control search-product" name="search" id="search" placeholder="Search here">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </section>
                <!-- Ecommerce Search Bar Ends -->

                <!-- Ecommerce Products Starts -->
                <section id="ecommerce-products" class="grid-view">
                    @forelse($barang as $d)
                    <div class="card ecommerce-card">
                        <div class="card-content">
                            @isset($d->diskon)
                            <div class="badge-diskon text-center text-danger" diskon="{{$d->diskon}}">
                                <a href="app-ecommerce-details.html">
                                    <img src="/images/resize/{{$d->gambar}}" class="img-fluid" alt="product image" style="width: 100%; height:100%;">
                            </div>
                            @else
                            <div class="text-center">
                                <a href="app-ecommerce-details.html">
                                    <img src="/images/resize/{{$d->gambar}}" class="img-fluid" alt="product image" style="width: 100%; height:100%;">
                            </div>
                            @endisset
                            <div class="card-body">
                                <div class="item-wrapper">
                                    <div>
                                        <h6 class="item-price">
                                            @if($d->diskon != null)
                                            <h6 class="text-secondary"><del>Rp. {{$d->harga_jual}},-</del></h6>
                                            <h6 class="text-danger">Rp. {{$d->harga_diskon}},-</h6>
                                            @else
                                            <h6 class="text-danger">Rp. {{$d->harga_jual}},-</h6>
                                            <br>
                                            @endif
                                    </div>
                                    <div class="item-rating">
                                        <a type="button" class="btn btn-primary btn-sm" href="{{route('homeShow', ['id' => $d->uuid])}}"> <i class="fas fa fa-search"> Detail</i></a>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a href="{{route('homeShow', ['id' => $d->uuid])}}">{{$d->nama_barang}}</a>
                                </div>
                                <div>
                                    <p class="item-description">
                                        {{$d->keterangan}}
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
                    @empty
                </section>
                <section class="text-center font-large-2" style="margin-top:30px; margin-bottom:700px;">
                    <a href="{{route('homeShop')}}" style="color: black;">
                        Not Found
                    </a>
                    @endforelse
                </section>
                <!-- Ecommerce Products Ends -->

                <!-- Ecommerce Pagination Starts -->
                <section id="ecommerce-pagination">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-2">
                                    @if (count($barang) > 0) <li class="page-item "><a class="page-link" href="{{$data->url('page=1')}}">First Page</a></li>
                                    {{$data->links()}}
                                    <li class="page-item "><a class="page-link" href="/home/shop?page={{$data->lastPage()}}">Last Page</a></li>
                                    @else

                                    @endif
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