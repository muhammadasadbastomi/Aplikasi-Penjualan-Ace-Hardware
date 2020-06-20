@component('mail::panel')
Hai {{$nama_pembeli}}, <br>
<a style="text-decoration: none;" href="['url' => 'http://127.0.0.1:8000/']">PT Ace Hardware</a> Hari ini Pada Tanggal {{$tgl_pengiriman}} Memberikan Informasi Diskon Untuk {{$nama_pembeli}}. <br>
Berikut Informasi Barang <a style="text-decoration: none;" href="['url' => 'http://127.0.0.1:8000/']">PT Ace Hardware</a> yang sedang Diskon : <br>

@component('mail::table')
| Nama Barang | Kategori | Harga Awal | Diskon | Waktu Aktif Diskon | Harga Diskon |
| :-------------: |:------------:| :-------------:| :--------:| :------------------:| :---------------: |
@foreach($data as $d)
| {{$d->nama_barang}} | @if($d->kategori == 1) Alat Rumah @elseif($d->kategori == 2) Alat Kebersihan @elseif($d->kategori == 3) Alat Dapur @elseif($d->kategori == 4) Otomotif @elseif($d->kategori == 5) Peralatan Elektronik @elseif($d->kategori == 6) Olahraga & Outdoor @elseif($d->kategori == 7) Lain-lain @endif | Rp. {{number_format($d->harga_jual, 0, ',', '.')}},- | {{$d->diskon}}% | {{Carbon\Carbon::parse($d->tgl_mulai)->translatedFormat('d F Y')}} - {{Carbon\Carbon::parse($d->tgl_mulai)->translatedFormat('d F Y')}} | Rp. {{$d->harga_diskon}},-
@endforeach
@endcomponent

TerimaKasih,<br>
<a style="text-decoration: none;" href="['url' => 'http://127.0.0.1:8000/']">PT Ace Hardware</a>, Qmall Banjarbaru<br>
Jl. A Yani KM 36, Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan.
@endcomponent