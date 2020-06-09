    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../../../includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown"><i class="feather icon-home"></i><span data-i18n="Home Living">Alat Rumah</span></a>
                        <ul class="dropdown-menu">
                            @foreach(getbarangrumah() as $d)
                            @if(getbarangrumah() != null)
                            <li data-menu=""><a class="dropdown-item" href="{{route('homeShow', ['id' => $d->uuid])}}" data-toggle="dropdown" data-i18n="eCommerce">{{$d->nama_barang}}</a>
                            </li>
                            @else
                            <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="eCommerce">Barang Belum Tersedia</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-trash"></i><span data-i18n="Alat Kebersihan">Alat Kebersihan</span></a>
                        <ul class="dropdown-menu">
                            @foreach(getbarangkebersihan() as $d)
                            @if(getbarangkebersihan() != null)
                            <li data-menu=""><a class="dropdown-item" href="{{route('homeShow', ['id' => $d->uuid])}}" data-toggle="dropdown" data-i18n="eCommerce">{{$d->nama_barang}}</a>
                            </li>
                            @else
                            <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="eCommerce">Barang Belum Tersedia</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="fas fa fa-cutlery"></i><span data-i18n=" Dapur"> Dapur</span></a>
                        <ul class="dropdown-menu">
                            @foreach(getbarangdapur() as $d)
                            @if(getbarangdapur() != null)
                            <li data-menu=""><a class="dropdown-item" href="{{route('homeShow', ['id' => $d->uuid])}}" data-toggle="dropdown" data-i18n="eCommerce">{{$d->nama_barang}}</a>
                            </li>
                            @else
                            <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="eCommerce">Barang Belum Tersedia</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="fas fa fa-wrench"></i><span data-i18n="Otomotif">Otomotif</span></a>
                        <ul class="dropdown-menu">
                            @foreach(getbarangotomotif() as $d)
                            @if(getbarangotomotif() != null)
                            <li data-menu=""><a class="dropdown-item" href="{{route('homeShow', ['id' => $d->uuid])}}" data-toggle="dropdown" data-i18n="eCommerce">{{$d->nama_barang}}</a>
                            </li>
                            @else
                            <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="eCommerce">Barang Belum Tersedia</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-zap"></i><span data-i18n="Peralatan Elektronik">Peralatan Elektronik</span></a>
                        <ul class="dropdown-menu">
                            @foreach(getbarangelektronik() as $d)
                            @if(getbarangelektronik() != null)
                            <li data-menu=""><a class="dropdown-item" href="{{route('homeShow', ['id' => $d->uuid])}}" data-toggle="dropdown" data-i18n="eCommerce">{{$d->nama_barang}}</a>
                            </li>
                            @else
                            <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="eCommerce">Barang Belum Tersedia</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-activity"></i><span data-i18n="Olahraga &amp; Outdoor">Olahraga &amp; Outdoor</span></a>
                        <ul class="dropdown-menu">
                            @foreach(getbarangoutdoor() as $d)
                            @if(getbarangoutdoor() != null)
                            <li data-menu=""><a class="dropdown-item" href="{{route('homeShow', ['id' => $d->uuid])}}" data-toggle="dropdown" data-i18n="eCommerce">{{$d->nama_barang}}</a>
                            </li>
                            @else
                            <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="eCommerce">Barang Belum Tersedia</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-more-horizontal"></i><span data-i18n="Lain-Lain">Lain - Lain</span></a>
                        <ul class="dropdown-menu">
                            @foreach(getbaranglain() as $d)
                            @if(getbaranglain() != null)
                            <li data-menu=""><a class="dropdown-item" href="{{route('homeShow', ['id' => $d->uuid])}}" data-toggle="dropdown" data-i18n="eCommerce">{{$d->nama_barang}}</a>
                            </li>
                            @else
                            <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="eCommerce">Barang Belum Tersedia</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->