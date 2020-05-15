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
                                <input type="text" class="form-control search-product" id="iconLeft5" placeholder="Search here">
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
                    <div class="card ecommerce-card">
                        <div class="card-content">
                            <div class="item-img text-center">
                                <a href="app-ecommerce-details.html">
                                    <img class="img-fluid" src="../../../app-assets/images/pages/eCommerce/1.png" alt="img-placeholder"></a>
                            </div>
                            <div class="card-body">
                                <div class="item-wrapper">
                                    <div>
                                        <h6 class="item-price">
                                            $39.99
                                        </h6>
                                    </div>
                                    <div class="item-rating">
                                        <a type="button" class="btn btn-primary btn-sm" href="{{route('homeShow')}}">Detail</a>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a href="{{route('homeShow')}}">Amazon - Fire TV Stick with Alexa Voice
                                        Remote - Black</a>
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
                </section>
                <!-- Ecommerce Products Ends -->

                <!-- Ecommerce Pagination Starts -->
                <section id="ecommerce-pagination">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-2">
                                    <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item" aria-current="page"><a class="page-link" href="#">4</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                    <li class="page-item next-item"><a class="page-link" href="#"></a></li>
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
                                            <span class="ml-50"> &lt;=$10</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="price-range" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">$10 - $100</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="price-range" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">$100 - $500</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="price-range" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">&gt;= $500</span>
                                        </span>
                                    </li>

                                </ul>
                            </div>
                            <!-- /Price Filter -->
                            <hr>
                            <!-- /Price Slider -->
                            <div class="price-slider">
                                <div class="price-slider-title mt-1">
                                    <h6 class="filter-title mb-0">Slider</h6>
                                </div>
                                <div class="price-slider">
                                    <div class="price_slider_amount mb-2">
                                    </div>
                                    <div class="form-group">
                                        <div class="slider-sm my-1 range-slider" id="price-slider"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Price Range -->
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
                                            <span class="ml-50">Appliances</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50"> Audio</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Cameras & Camcorders</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Car Electronics & GPS</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Cell Phones</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Computers & Tablets</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50"> Health, Fitness & Beauty</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Office & School Supplies</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">TV & Home Theater</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category-filter" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50">Video Games
                                            </span>
                                        </span>
                                    </li>

                                </ul>
                            </div>
                            <!-- Categories Ends -->
                            <hr>
                            <!-- Brands -->
                            <div class="brands">
                                <div class="brand-title mt-1 pb-1">
                                    <h6 class="filter-title mb-0">Brands</h6>
                                </div>
                                <div class="brand-list" id="brands">
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" value="false">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">Insignia™</span>
                                            </span>
                                            <span>746</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" value="false">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">
                                                    Samsung
                                                </span>
                                            </span>
                                            <span>633</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" value="false">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">
                                                    Metra
                                                </span>
                                            </span>
                                            <span>591</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" value="false">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">HP</span>
                                            </span>
                                            <span>530</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" value="false">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">Apple</span>
                                            </span>
                                            <span>442</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" value="false">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">GE</span>
                                            </span>
                                            <span>394</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" value="false">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">Sony</span>
                                            </span>
                                            <span>350</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" value="false">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">Incipio</span>
                                            </span>
                                            <span>320</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" value="false">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">KitchenAid</span>
                                            </span>
                                            <span>318</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" value="false">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">Whirlpool</span>
                                            </span>
                                            <span>298</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Brand -->
                            <hr>
                            <!-- Rating section starts -->
                            <div id="ratings">
                                <div class="ratings-title mt-1 pb-75">
                                    <h6 class="filter-title mb-0">Ratings</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <ul class="unstyled-list list-inline ratings-list mb-0">
                                        <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                        </li>
                                        <li>& up</li>
                                    </ul>
                                    <div class="stars-received">(160)</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <ul class="unstyled-list list-inline ratings-list mb-0">
                                        <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                        </li>
                                        <li>& up</li>
                                    </ul>
                                    <div class="stars-received">(176)</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <ul class="unstyled-list list-inline ratings-list mb-0">
                                        <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                        </li>
                                        <li>& up</li>
                                    </ul>
                                    <div class="stars-received">(291)</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <ul class="unstyled-list list-inline ratings-list mb-0 ">
                                        <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                        </li>
                                        <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                        </li>
                                        <li>& up</li>
                                    </ul>
                                    <div class="stars-received">(190)</div>
                                </div>
                            </div>
                            <!-- Rating section Ends -->
                            <hr>
                            <!-- Clear Filters Starts -->
                            <div id="clear-filters">
                                <button class="btn btn-block btn-primary">CLEAR ALL FILTERS</button>
                            </div>
                            <!-- Clear Filters Ends -->

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