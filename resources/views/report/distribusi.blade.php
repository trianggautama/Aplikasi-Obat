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
        border: 1px solid black;
      }
      th{
        text-align: center;
      }
      td{
        text-align: center;
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
                <p style="margin:0px;">Jl. Palang Merah No.2, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70714</p>
            </div>
            <br>
    </div>
    <div class="container">
    <hr style="margin-top:1px;">
        <div class="isi">
            <h2 style="text-align:center;">DATA DISTRIBUSI OBAT</h2>
            <br>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode distribusi</th>
                                    <th>puskesmas Tujuan</th>
                                    <th>Tanggal distribusi</th>
                                    <th>Status distribusi</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Banyak Jenis obat</th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->kode_distribusi}}</td>
                                    <td>{{$d->puskesmas->user->nama}}</td>
                                    <td> {{Carbon\carbon::parse($d->tgl_distribusi)->translatedFormat('d F Y')}}</td>
                                    <td>@if($d->status_distribusi == 1) belum di verifikasi  @else terverifikasi  @endif</td>
                                    <td>@if($d->tgl_diterima) {{Carbon\carbon::parse($d->tgl_diterima)->translatedFormat('d F Y')}} @else - @endif</td>
                                    <td>{{$d->rincian->count()}} Jenis Stok Obat</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                <br>
                <br>
                <div class="ttd">
                <p style="margin:0px"> Banjarbaru,</p>
                <h6 style="margin:0px">Mengetahui</h6>
                <h5 style="margin:0px">Kepala Dinas </h5>
                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px">H. RIZANA MIRZA SH,. M.Kes</h5>
                <h5 style="margin:0px">NIP. 19660828 199303 1 007</h5>
                </div>
            </div>
        </div>
    </body>
</html>