@component('mail::message')
Hai {{$nama_pembeli}},

Barang anda {{$nama_barang}} dengan Kode Pengiriman {{$kode}} <br>
Sedang di @if($status == 3) Terkirim @elseif($status == 2) Dalam Pengiriman @else Packing @endif Pada Tanggal {{$tgl_pengiriman}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Klik Disini Untuk Kunjungi Website Kami
@endcomponent

TerimaKasih,<br>
PT Ace Hardware, Qmall Banjarbaru<br>
Jl. A Yani KM 36, Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan.
@endcomponent