<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('adminIndex')}}">
                    <img src="{{asset('img/sidebar.png') }}"
                        style="width: 50px;  margin-bottom:12px; margin-left: -8px; ">
                    <h5 class=" brand-text sm-0">Hardware</h5>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ (\Request::route()->getName() == 'adminIndex') ? 'active' : '' }}"> <a
                    href="{{route('adminIndex')}}"><i class="feather icon-home"></i><span
                        class="menu-title">Dashboard</span></a></li>
            <li class="nav-item"><a href="#"><i class="feather icon-server "></i><span class="menu-title">Master
                        Data</span></a>
                <ul class="menu-content">
                    <li class="{{ (\Request::route()->getName() == 'thumbIndex') ? 'active' : '' }}"><a
                            href="{{ route('thumbIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Etalase</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'supplierIndex') ? 'active' : '' }}"><a
                            href="{{ route('supplierIndex') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="eCommerce">Data Supplier</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'satuanIndex') ? 'active' : '' }}"><a
                            href="{{ route('satuanIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Data Satuan</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'pembeliIndex') ? 'active' : '' }} "><a
                            href="{{route('pembeliIndex')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Data Pembeli</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'barangIndex') ? 'active' : '' }}"><a
                            href="{{ route('barangIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Data Barang</span></a></li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('barang')) ? 'active' : '' }}"><a href="#"><i
                        class="feather icon-package"></i><span class="menu-title">Pengelolaan</span></a>
                <ul class="menu-content">
                    <li class="{{ (\Request::route()->getName() == 'datangIndex') ? 'active' : '' }}"><a
                            href="{{ route('datangIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Barang Datang</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'terjualIndex') ? 'active' : '' }}"><a
                            href="{{ route('terjualIndex') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="eCommerce">Barang Terjual</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'garansiIndex') ? 'active' : '' }}"><a
                            href="{{ route('garansiIndex') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="eCommerce">Barang Garansi</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'rusakIndex') ? 'active' : '' }}"><a
                            href="{{ route('rusakIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Barang Rusak</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'pengirimanIndex') ? 'active' : '' }}"><a
                            href="{{ route('pengirimanIndex') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="eCommerce">Pengiriman Barang</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'orderIndex') ? 'active' : '' }}"><a
                            href="{{ route('orderIndex') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="eCommerce">Order</span></a></li>
                </ul>
            </li>
            <li class="nav-item {{ (\Request::route()->getName() == 'userEdit') ? 'active' : '' }} "><a
                    href="{{route('userEdit', ['id' => Auth::user()->uuid])}}"><i
                        class="feather icon-settings"></i><span class="menu-title" data-i18n="Account Settings">Edit
                        Profile</span></a>
            </li>
            @if(auth()->user()->role == '1')
            <li class="nav-item "><a href="#"><i class="feather icon-user"></i><span class="menu-title"
                        data-i18n="User">User</span></a>
                <ul class="menu-content">
                    <li class="{{ (\Request::route()->getName() == 'userAdmin') ? 'active' : '' }}"><a
                            href="{{route('userAdmin')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="List">Admin</span></a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'userKaryawan') ? 'active' : '' }}"><a
                            href="{{route('userKaryawan')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="View">Karyawan</span></a>
                    </li>
                </ul>
            </li>
            @endif



        </ul>
    </div>
</div>
<!-- END: Main Menu-->
