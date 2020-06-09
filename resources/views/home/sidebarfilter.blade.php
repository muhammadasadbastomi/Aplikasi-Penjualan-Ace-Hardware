<div class="sidebar-shop" id="ecommerce-sidebar-toggler" style="margin-top:13px;">
    <div class="card">
        <div class="card-body">
            <form action="/home/shop" method="GET">
                <div class="multi-range-price">
                    <div class="multi-range-title pb-75">
                        <h6 class="filter-title mb-0">Range Harga</h6>
                    </div>
                    <ul class="list-unstyled harga" id="harga">
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="harga" id="harga" value="0" checked>
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50">All</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="harga" id="harga1" value="10000">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50">Kurang dari Rp. 10.000</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="harga" id="harga" value="100000">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50">Rp. 10.000 - Rp. 100.000</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="harga" id="harga" value="500000">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50">Rp. 100.000 - Rp. 500.000</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="harga" id="harga" value="499999">
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
                        <h6 class="filter-title mb-1">Kategori</h6>
                    </div>
                    <ul class="list-unstyled categories-list">
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="kategori" value="0" checked>
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50"> All</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="kategori" value="1">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50">Alat Rumah</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="kategori" value="2">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50"> Alat Kebersihan</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="kategori" value="3">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50">Dapur</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="kategori" value="4">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50">Otomotif</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="kategori" value="5">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50">Peralatan Eletronik</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="kategori" value="6">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-50">Olahraga & Outdoor</span>
                            </span>
                        </li>
                        <li>
                            <span class="vs-radio-con vs-radio-danger py-25">
                                <input type="radio" name="kategori" value="7">
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
                    <button type="submit" class="btn btn-block btn-primary border-dark">Cari Filter</button>
                    <button type="reset" class="btn btn-block btn-secondary border-dark">Cancel Filter</button>
                </div>
                <!-- Clear Filters Ends -->
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <!-- Rating section starts -->
            <div id="ratings">
                <div class="ratings-title mt-1 pb-75">
                    <h6 class="filter-title mb-0">Produk Terlaris <div class="badge badge-danger float-right" style="margin-top: -4px;;">Popular</div>
                    </h6>
                </div>
                <div class="col-md-12 box">
                    <marquee width="100%" onmouseout="this.start()" onmouseover="this.stop()" scrollamount="5" direction="up" height="270px;">
                        @foreach ($terlaris as $d)
                        <a href="{{route('homeShow', ['id' => $d->barang->uuid])}}" style="text-align: center;"><img class="terlaris" src="/images/resize/{{$d->barang->gambar}}" height="190" style="margin-top:70px;">
                            <p class="terlaris">{{$d->barang->nama_barang}} <br> Rp.{{number_format($d->barang->harga_jual, 0,',','.')}},-</p>
                        </a>
                        @endforeach
                    </marquee>
                </div>
            </div>
            <!-- Rating section Ends -->
        </div>
    </div>
</div>