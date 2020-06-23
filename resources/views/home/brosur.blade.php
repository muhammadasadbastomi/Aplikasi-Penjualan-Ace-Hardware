<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brosur Ace Hardware</title>
    <link rel="icon" type="image/png" href="{{url('img/logo.png')}}">
    <style>
        .logo {
            margin-top: 15px;
            float: left;
            margin-right: -5px;
            width: 15%;
            padding: 0px;
            text-align: right;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            font-size: 11px;
            border: none;
            padding: 20px;
            text-align: center;
        }

        .judul {
            text-align: center;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }

        .sizeimg {
            width: 60px;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 150px;
            padding: 0px;
        }

        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
        }

        br {
            margin-bottom: 5px !important;
        }

        h5 {
            line-height: 0.3;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo">
            <img class="sizeimg" src="{{url('img/logo.png')}}">
        </div>
        <div class="headtext">
            <h3 style="margin:0px;">PT ACE HARDWARE</h3>
            <h1 style="margin:0px;">Q Mall Banjarbaru</h1>
            <p style="margin:0px;">Jl. A. Yani KM 36, Komet, Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan 70714
            </p>
        </div>
    </div>

    <div class="container" style="margin-top:-40px;">
        <table class='table table-bordered nowrap'>

            <tbody>

                <div class="mt-4 mb-2 text-left">
                    <h2> Produk Terbaru <div class="badge badge-danger"> </div>
                    </h2>
                    <table>
                        @foreach ($data as $d)
                        <td>
                            <h2>{{ $d->nama_barang }}</h2>
                            <h3> @if($d->kategori == 1)
                                Peralatan Rumah
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
                                Kategori Lainnya
                                @else
                                -
                                @endif</h3>
                            <hr>
                            <img src="/images/resize/{{$d->gambar}}" class="img-fluid" alt="image">
                            <hr>
                            <h3 style="text-align: left">Stok : {{ $d->stok_tersedia }}</h3>
                            <h3 style="text-align: left">Harga : @currency($d->harga_jual)</h3>
                        </td>
                        @endforeach
                    </table>
                </div>

                <div class="mt-4 mb-2 text-left">
                    <h2> Produk Diskon <div class="badge badge-danger"> </div>
                    </h2>
                    <table>
                        @foreach($diskon as $d)
                        <td>
                            <h2>{{ $d->nama_barang }}</h2>
                            <h3> @if($d->kategori == 1)
                                Peralatan Rumah
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
                                Kategori Lainnya
                                @else
                                -
                                @endif</h3>
                            <hr>
                            <img src="/images/resize/{{$d->gambar}}" class="img-fluid" alt="image">
                            <hr>
                            <h3 style="text-align: left">Stok : {{ $d->stok_tersedia }}</h3>
                            <h3 style="text-align: left">Harga Awal : @currency($d->harga_jual)</h3>
                            <h3 style="text-align: left">Diskon : {{ $d->diskon }}%</h3>
                            <h3 style="text-align: left">Diskon berlaku pada
                                {{Carbon\Carbon::parse($d->tgl_mulai)->translatedFormat('d F Y')}} <br> sampai dgn <br>
                                {{Carbon\Carbon::parse($d->tgl_akhir)->translatedFormat('d F Y')}}</h3>
                            </h3>
                            <h3 style="text-align: left">Rp.{{$d->harga_diskon}}</h3>

                            @endforeach
                    </table>
                </div>

                <br>
                <br>
                {{-- <button onclick="window.print();">Cetak</button> --}}
                <!-- <div class="ttd">
            <h5>
                Banjarbaru,
            </h5>
            <h5>isi jabatan</h5>
            <br>
            <br>
            <h5 style="text-decoration:underline;">nama pejabat</h5>
            <h5>golongan / kode golongan</h5>
            <h5>NIP.</h5>
        </div> -->
    </div>
</body>

</html>
