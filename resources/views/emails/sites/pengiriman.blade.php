@component('mail::message')
Hai {{$nama_pembeli}},

Barang anda {{$nama_barang}} dengan Kode Pengiriman {{$kode}} <br>
@if($status == 3) Sudah Terkirim @elseif($status == 2) Sedang Dalam Pengiriman @else Sedang di Packing @endif Pada Tanggal {{$tgl_pengiriman}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/', 'color' => 'primary'])
Klik Disini Untuk Kunjungi Website Kami
@endcomponent

TerimaKasih,<br>
<a style="text-decoration: none;" href="['url' => 'http://127.0.0.1:8000/']">PT Ace Hardware</a>, Qmall Banjarbaru<br>
Jl. A Yani KM 36, Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan.
@endcomponent