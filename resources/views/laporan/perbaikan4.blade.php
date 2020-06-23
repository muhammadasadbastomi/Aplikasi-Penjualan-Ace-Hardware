<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Barang Belum Diperbaiki</title>
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
            border: 1px solid;
            padding-left: 5px;
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
            <img class="sizeimg" src="img/logo.png">
        </div>
        <div class="headtext">
            <h3 style="margin:0px;">PT ACE HARDWARE</h3>
            <h1 style="margin:0px;">Q Mall Banjarbaru</h1>
            <p style="margin:0px;">Jl. A. Yani KM 36, Komet, Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan 70714
            </p>
        </div>
        <hr>
    </div>

    <div class="container" style="margin-top:-40px;">
        <h3 style="text-align:center;text-transform: uppercase;">Laporan Data Barang Belum Diperbaiki Pada Bulan
            {{$now}}</h3>
        <table class='table table-bordered nowrap'>
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Barang</th>
                    <th scope="col" class="text-center">Kerusakan</th>
                    <th scope="col" class="text-center">Tanggal Cek</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Tanggal Selesai</th>
                    <th scope="col" class="text-center">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td scope="col" class="text-center">{{$loop->iteration}}</td>
                    <td scope="col" class="text-center">{{ $d->barang->nama_barang }}</td>
                    <td scope="col" class="text-center">{{ $d->kerusakan }}</td>
                    <td scope="col" class="text-center">{{Carbon\Carbon::parse($d->tgl_cek)->translatedFormat('d F Y')}}
                    </td>
                    @if($d->status == 1)
                    <td scope="col" class="text-center">Belum diperbaiki</td>
                    @elseif($d->status == 2)
                    <td scope="col" class="text-center">Dalam Perbaikan</td>
                    @elseif($d->status == 3)
                    <td scope="col" class="text-center">Selesai Perbaikan</td>
                    @elseif($d->status == 4)
                    <td scope="col" class="text-center">Tidak Bisa Diperbaiki</td>
                    @else
                    <td scope="col" class="text-center"><a class="btn btn-success btn-sm text-white">-</a>
                    </td>
                    @endif
                    <!-- <td scope="col" class="text-center">{{ $d->tgl_selesai }}</td> -->
                    <td scope="col" class="text-center">
                        @if($d->tgl_selesai)
                        {{Carbon\Carbon::parse($d->tgl_selesai)->translatedFormat('d F Y')}}
                        @else
                        -
                        @endif
                    </td>
                    <td scope="col" class="text-center">{{ $d->jumlah_barang }} {{ $d->barang->satuan->nama_satuan }}
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br>
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
