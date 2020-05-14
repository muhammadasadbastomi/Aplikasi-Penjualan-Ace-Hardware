<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title> @yield('title')</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/swiper.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-ecommerce-details.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

    @yield('head')
</head>

<body class="horizontal-layout horizontal-menu content-detached-left-sidebar ecommerce-application navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-detached-left-sidebar">

    <!-- BEGIN: Navbar-->
    @include('layouts/home/navbar')
    <!-- END: Navbar-->

    <!-- Begin: Sidebar -->
    @include('layouts/home/sidebar')
    <!-- End: Sidebar -->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
        <div class="d-flex flex-row">
            <div class="col-md-3 col-sm-12">
                <h5 class="footer-heading" style="padding-left:35px; margin-bottom:14px; font-size:12px;"><b><i class="fas fa fa-map-marker"></i> Location</b>
                </h5>
                <div class="footer-section">
                    <ul class="footer-navs" style="list-style-position: outside; list-style-type:none;   line-height: 2;">
                        <li>
                            <p style="color:black;">Q Mall Banjarbaru <br>Lt. UG Jl. A. Yani KM 36, 8 </p>
                        </li>
                    </ul>
                </div>
            </div>
            <section class="col-md-3 col-sm-12">
                <h5 class="footer-heading" style="padding-left:35px; margin-bottom:14px; font-size:13px;"><b><i class="fas fa fa-volume-control-phone"></i> Customer Service</b>
                </h5>
                <div class="footer-section">
                    <ul class="footer-navs" style="list-style-position: outside; list-style-type:none;">
                        <li>
                            <a style="color: black;" href="https://www.acehardware.co.id/service-center" target="">Service Center</a>
                        </li>
                        <li>
                            <a style="color: black;" href="https://www.acehardware.co.id/faq" target="">FAQ</a>
                        </li>
                    </ul>
                </div>
            </section>

            <section class="col-md-3 col-sm-12">
                <h5 class="footer-heading" style="padding-left:35px; margin-bottom:14px; font-size:13px;"><b><i class="fas fa fa-phone"></i> Call Center</b>
                </h5>
                <div class="footer-section">
                    <ul class="footer-navs" style="list-style-position: outside; list-style-type:none;">
                        <li>
                            <p style="color:black;">Phone : 0511-4770 970 </p>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="col-md-3 col-sm-12">
                <h5 class="footer-heading" style="padding-left:35px; margin-bottom:14px; font-size:13px;"><b><i class="feather icon-radio"></i> Social Media</b>
                </h5>
                <div class="footer-section">
                    <ul class="footer-navs" style="list-style-position: outside; list-style-type:none;">
                        <div class="social-medias">
                            <a style="color: black;" class="social-media --fb" href="https://www.facebook.com/aceindonesia" target="blank">
                                <div class="badge badge-success mr-1 mb-1">
                                    <i class="ficon feather icon-facebook"></i>
                                </div>
                            </a>
                            <a style="color: black;" class="social-media --tw" href="https://twitter.com/aceindonesia" target="blank">
                                <div class="badge badge-info mr-1 mb-1">
                                    <i class="ficon feather icon-twitter"></i>
                                </div>
                            </a>
                            <a style="color: black;" class="social-media --ig" href="https://www.instagram.com/aceindonesia" target="blank">
                                <div class="badge badge-danger mr-1 mb-1">
                                    <i class="ficon feather icon-instagram"></i>
                                </div>
                            </a>
                            <a style="color: black;" class="social-media --yt" href="https://www.youtube.com/channel/UCPfmCvkq7qpNqqwJ_2OoCzQ" target="blank">
                                <div class="badge badge-warning mr-1 mb-1">
                                    <i class="ficon feather icon-youtube"></i>
                                </div>
                            </a>
                        </div>

                        <a style="color: black;" class="text-orange" href="https://www.acehardware.co.id/social-wall">
                            [Check Our Story]
                        </a>
                    </ul>
                </div>
            </section>
        </div>
    </footer>
    </div>
    </div>

    </footer>
    <!-- END: Footer-->


    @yield('script')

    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/swiper.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-ecommerce-details.js"></script>
    <script src="../../../app-assets/js/scripts/forms/number-input.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>