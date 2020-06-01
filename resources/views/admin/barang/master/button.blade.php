<a class="btn btn-sm btn-info text-white" data-id="{{$b->id}}" data-keterangan="{{$b->keterangan}}" data-gambar="{{$b->gambar}}" data-nama="{{$b->nama_barang}}" data-supplier="{{$b->supplier->supplier}}" data-harga="Rp. {{number_format($b->harga_jual, 0, ',', '.')}},-" data-kode="{{$b->kode_barang}}" data-satuan="{{$b->satuan}}" data-departement="{{$b->departement}}" data-diskon="@if(empty($b->diskon)) -
@else
{{$b->diskon}}%
@endif" data-harga_diskon="@if(empty($b->diskon)) -
@else
Rp. {{$b->harga_diskon}},-
@endif" data-stok="{{$b->stok_tersedia}}" data-kategori="@if($b->kategori == 1)
                                                        Alat Rumah
                                                        @elseif($b->kategori == 2)
                                                        Alat Kebersihan
                                                        @elseif($b->kategori == 3)
                                                        Alat Dapur
                                                        @elseif($b->kategori == 4)
                                                        Otomotif
                                                        @elseif($b->kategori == 5)
                                                        Peralatan Elektronik
                                                        @elseif($b->kategori == 6)
                                                        Olahraga & Outdoor
                                                        @elseif($b->kategori == 7)
                                                        Lain-lain
                                                        @else
                                                        -
                                                        @endif" data-toggle="modal" data-target="#showModal"><i class="feather icon-search"></i></a>