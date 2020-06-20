<div class="modal fade text-left" id="modalemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Tabel Barang Diskon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('barangdiskonemail')}}">
                    @csrf
                    <Button class="btn btn-outline-danger float-right btn-sm border-top-0 border-left-0 border-right-0" style="margin-top: 11px;"><i class="feather icon-mail"> </i> Klik Disini Untuk Broadcast Ke Semua Pembeli</Button>
                </form>
                <table class="table zero-configuration nowrap">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga Awal</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Waktu Aktif Diskon</th>
                            <th scope="col">Harga Diskon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$d->nama_barang}}</td>
                            <td>
                                @if($d->kategori == 1)
                                Alat Rumah
                                @elseif($d->kategori == 2)
                                Alat Kebersihan
                                @elseif($d->kategori == 3)
                                Alat Dapur
                                @elseif($d->kategori == 4)
                                Otomotif
                                @elseif($d->kategori == 5)
                                Peralatan Elektronik
                                @elseif($d->kategori == 6)
                                Olahraga & Outdoor
                                @elseif($d->kategori == 7)
                                Lain-lain
                                @else
                                -
                                @endif
                            </td>
                            <td>Rp. {{number_format($d->harga_jual, 0, ',', '.')}},-</td>
                            <td>{{$d->diskon}}%</td>
                            <td>{{Carbon\Carbon::parse($d->tgl_mulai)->translatedFormat('d F Y')}} - {{Carbon\Carbon::parse($d->tgl_akhir)->translatedFormat('d F Y')}}</td>
                            <td>Rp. {{$d->harga_diskon}},-</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>