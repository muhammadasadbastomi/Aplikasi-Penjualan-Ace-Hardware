<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <img src="{{asset('img/logo.png') }}" style="width: 50px;">
                    <h2 class="brand-text mb-0">Ace Hardware</h2>
                </a></li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="#"><i class="feather icon-home"></i><span class="menu-title">Master
                        Data</span></a>
                <ul class="menu-content">
                    <li class="active"><a href="#"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="Analytics">Dashboard</span></a></li>
                    <li><a href="{{ route('supplierIndex') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="eCommerce">Supllier</span></a></li>
                    <li><a href="{{ route('barangIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Barang Master</span></a></li>
                    <li><a href="{{ route('datangIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Barang Datang</span></a></li>
                    <li><a href="{{ route('pesananIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Barang Pesanan</span></a></li>
                    <li><a href="{{ route('diskonIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Barang Diskon</span></a></li>
                    <li><a href="{{ route('pengirimanIndex') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="eCommerce">Barang Status Pengiriman</span></a></li>
                    <li><a href="{{ route('terjualIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Barang Terjual</span></a></li>
                    <li><a href="{{ route('garansiIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Barang Garansi</span></a></li>
                    <li><a href="{{ route('rusakIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Barang Rusak</span></a></li>
                    <li><a href="{{ route('perbaikanIndex') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="eCommerce">Barang Dalam Perbaikan</span></a></li>
                </ul>
            <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title"
                        data-i18n="User">User</span></a>
                <ul class="menu-content">
                    <li><a href="app-user-list.html"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="List">List</span></a>
                    </li>
                    <li><a href="app-user-view.html"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="View">View</span></a>
                    </li>
                    <li><a href="app-user-edit.html"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="Edit">Edit</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
