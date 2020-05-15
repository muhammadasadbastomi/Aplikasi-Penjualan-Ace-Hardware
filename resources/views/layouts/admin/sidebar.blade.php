<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('adminIndex')}}">
                    <img src="{{asset('img/sidebar.png') }}" style="width: 50px;  margin-bottom:12px; margin-left: -8px; ">
                    <h5 class=" brand-text sm-0">Hardware</h5>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"> <a href="{{route('adminIndex')}}"><i class="feather icon-home"></i><span class="menu-title">Dashboard</span></a></li>
            <li class=" nav-item"><a href="#"><i class="feather icon-server "></i><span class="menu-title">Master
                        Data</span></a>
                <ul class="menu-content">
                    <li><a href="{{ route('thumbIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Supplier</span></a></li>
                    <li><a href="{{ route('supplierIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Supplier</span></a></li>
                    <li><a href="{{ route('barangIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Barang Master</span></a></li>
                    <li><a href="{{ route('datangIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Barang Datang</span></a></li>
                    <li><a href="{{ route('pesananIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Barang Pesanan</span></a></li>
                    <!-- <li><a href="{{ route('diskonIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Barang Diskon</span></a></li> -->
                    <li><a href="{{ route('pengirimanIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Status Pengiriman</span></a></li>
                    <li><a href="{{ route('terjualIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Barang Terjual</span></a></li>
                    <li><a href="{{ route('garansiIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Barang Garansi</span></a></li>
                    <li><a href="{{ route('rusakIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Barang Rusak</span></a></li>
                    <li><a href="{{ route('perbaikanIndex') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Dalam Perbaikan</span></a></li>
                </ul>
            <li class="nav-item"><a href="{{route('userEdit')}}"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Account Settings">Edit Profile</span></a>
            </li>
            <li class="nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">User</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('userAdmin')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Admin</span></a>
                    </li>
                    <li><a href="{{route('userKaryawan')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Karyawan</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->