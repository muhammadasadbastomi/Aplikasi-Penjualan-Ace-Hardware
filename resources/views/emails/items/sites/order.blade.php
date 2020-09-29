@if($diskon_order == null)

@component('mail::message')
Hai {{ $nama_order }}

Anda telah melakukan pemesanan {{ $nama_barang }} dengan harga Rp.{{number_format($harga_order, 0, ',', '.')}}, dan
jumlah
{{ $jumlah_order }}
barang dan total yang harus dibayar adalah Rp.{{number_format($total_order, 0, ',', '.')}},

<br>
Silahkan kunjungi Ace hardware Qmall Banjarbaru untuk melakukan pembayaran sebelum
{{Carbon\Carbon::parse($tgl_order)->translatedFormat('d F Y')}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/', 'color' => 'primary'])
Klik Disini Untuk Kunjungi Website Kami
@endcomponent

TerimaKasih,<br>
<a style="text-decoration: none;" href="['url' => 'http://127.0.0.1:8000/']">PT Ace Hardware</a>, Qmall Banjarbaru<br>
Jl. A Yani KM 36, Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan.
@endcomponent

{{-- jika diskon --}}
@elseif($diskon_order == !null)

@component('mail::message')
Hai {{ $nama_order }}

Anda telah melakukan pemesanan {{ $nama_barang }} dengan harga barang Rp.{{ $harga_awal }} dan diskon sebesar
{{ $diskon_order }}% sehingga harga barang satuanya adalah
Rp.{{number_format($harga_order, 0, ',', '.')}}, dan jumlah
{{ $jumlah_order }}
barang dan total yang harus dibayar adalah {{number_format($total_order, 0, ',', '.')}},

<br>
Silahkan kunjungi Ace hardware Qmall Banjarbaru untuk melakukan pembayaran sebelum
{{Carbon\Carbon::parse($tgl_order)->translatedFormat('d F Y')}}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/', 'color' => 'primary'])
Klik Disini Untuk Kunjungi Website Kami
@endcomponent

TerimaKasih,<br>
<a style="text-decoration: none;" href="['url' => 'http://127.0.0.1:8000/']">PT Ace Hardware</a>, Qmall Banjarbaru<br>
Jl. A Yani KM 36, Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan.
@endcomponent

@endif
