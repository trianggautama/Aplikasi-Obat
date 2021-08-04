<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    h4,h2{
        font-family:serif;
    }
        body{
            font-family:sans-serif;
        }
        table{
        border-collapse: collapse;
        width:100%;
      }
      table, th, td{
        /* border: 1px solid black; */
      }

      .border{
                  border: 1px solid black;
      }
      th{
        text-align: center;
      }
      td{
        text-align: left;
      }
      br{
          margin-bottom: 5px !important;
      }
     .judul{
         text-align: center;
     }
     .header{
         margin-bottom: 0px;
         text-align: center;
         height: 110px;
         padding: 0px;
     }
     .pemko{
         width:70px;
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 18%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 72%;
         padding-left:0px;
         padding-right:10%;
     }
     hr{
         margin-top: 10%;
         height: 3px;
         background-color: black;
         width:100%;
     }
     .ttd{
         margin-left:65%;
         text-align: center;
         text-transform: uppercase;
     }
     .text-right{
         text-align:right;
     }
     .isi{
         padding:10px;
     }
    </style>
</head>
<body>
    <div class="header">
            <div class="logo">
                    <img  class="pemko" src="pemko.png">
            </div>
            <div class="headtext">
                <h3 style="margin:0px;">PEMERINTAH KOTA BANJARBARU </h3>
                <h3 style="margin:0px; text-transform:uppercase;">DINAS KESEHATAN</h3>
                <h3 style="margin:0px; text-transform:uppercase;">UPTD {{$data->puskesmas->user->nama}}</h3>
                <p style="margin:0px;">Jl. Palang Merah No.2, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70714</p>
            </div>
            <br>
    </div>
    <div class="container">
    <hr style="margin-top:1px;">
        <div class="isi">
            <h2 style="text-align:center; text-transform:uppercase;">BERITA ACARA PEMUSNAHAN OBAT </h2>
            <br>
                <p>Pada hari ini {{Carbon\carbon::parse($data->created_at)->translatedFormat('d F Y')}} sesuai dengan Peraturan Menteri Kesehatan Republik Indonesia Nomor 35 tahun 2014 tentang Standar Pelayanan Kefarmasian di Apotek/ataupun unit pelaksana teknis bidang Kesehatan, kami :</p>
                <table class="table table-striped">
                    <tr>
                        <td width="25%">Puskesmas</td>
                        <td width="3%">:</td>
                        <td>{{$data->puskesmas->user->nama}}</td>
                    </tr>
                    <tr>
                        <td width="25%">Nama Pasien</td>
                        <td width="3%">:</td>
                        <td>{{$data->nama}}</td>
                    </tr>
                    <tr>
                        <td width="25%">Diagnosa</td> 
                        <td width="3%">:</td>
                        <td>{{$data->diagnosa}}</td>
                    </tr>
                    <tr>
                        <td width="25%">Tanggal Transaksi</td>
                        <td width="3%">:</td>
                        <td>{{Carbon\carbon::parse($data->created_at)->translatedFormat('d F Y')}}</td>
                    </tr>
                </table>
                <br>
                <p>Telah melakukan pemusnahan obat sebagaimana tercantum dalam daftar dibawah, Demikian berita acara ini kami buat sesungguhnya dengan penuh tanggungjawab.</p>
                <h3 style="text-align:center; text-transform:uppercase;">RINCIAN OBAT</h3>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center border">No</th>
                            <th class="border">Obat</th>
                            <th class="border">Kode Stok</th>
                            <th class="border">Tanggal Kadaluarsa</th>
                            <th class="text-center border">volume</th>
                        </tr>
                    </thead> 
                    <tbody>  
                        @foreach($rincian as $d)
                        <tr>
                            <td class="text-center border">{{$loop->iteration}}</td>
                            <td class="border">{{$d->stok_puskesmas->obat->nama_obat}}</td>
                            <td class="border">{{$d->stok_puskesmas->kode_stok}}</td>
                            <td class="border">{{Carbon\carbon::parse($d->stok_puskesmas->tgl_exp)->translatedFormat('d F Y')}}</td>
                            <td class="text-center border">{{$d->volume}} {{$d->stok_puskesmas->obat->satuan->satuan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                <div class="ttd">
                <p style="margin:0px"> Banjarbaru,</p>
                <h6 style="margin:0px">Mengetahui</h6>
                <h5 style="margin:0px">{{$data->puskesmas->jabatan_pimpinan}} </h5>
                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px">{{$data->puskesmas->nama_pimpinan}}</h5>
                <h5 style="margin:0px">NIP. {{$data->puskesmas->nip_pimpinan}}</h5>
                </div>
            </div>
        </div>
    </body>
</html>