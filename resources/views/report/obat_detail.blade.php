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
                <p style="margin:0px;">Jl. Palang Merah No.2, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70714</p>
            </div>
            <br>
    </div>
    <div class="container">
    <hr style="margin-top:1px;">
        <div class="isi">
            <h2 style="text-align:center;">DATA DETAIL OBAT</h2>
            <br>
                <table class="table table-striped">
                    <tr>
                        <td width="17%">Kode Obat</td>
                        <td width="3%">:</td>
                        <td>{{$data->kode_obat}}</td>
                    </tr>
                    <tr>
                        <td width="17%">Nama Obat</td>
                        <td width="3%">:</td>
                        <td>{{$data->nama_obat}}</td>
                    </tr>
                    <tr>
                        <td width="17%">Jenis Obat</td>
                        <td width="3%">:</td>
                        <td>{{$data->jenis_obat}}</td>
                    </tr>
                    <tr>
                        <td width="17%">Dosis</td>
                        <td width="3%">:</td>
                        <td>{{$data->dosis}}</td>
                    </tr>
                    <tr>
                        <td width="17%">Uraian</td>
                        <td width="3%">:</td>
                        <td>{{$data->uraian}}</td>
                    </tr>
                    <tr>
                        <td width="17%">Kategori Obat</td>
                        <td width="3%">:</td>
                        <td>{{$data->kategori->kategori}}</td>
                    </tr>
                    <tr>
                        <td width="17%">Satuan Obat</td>
                        <td width="3%">:</td>
                        <td>{{$data->satuan->satuan}}</td>
                    </tr>
                </table>
                <br>
                <br>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center border">No</th>
                                    <th class="border">Kode Obat</th>
                                    <th class="border">Nama Obat</th>
                                    <th class="border">tgl Masuk</th>
                                    <th class="border">Tgl Expired</th>
                                    <th class="text-center  border">volume</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($stok as $d)
                                <tr>
                                    <td class="text-center border">{{$loop->iteration}}</td>
                                    <td class="border">{{$d->obat->kode_obat}}</td>
                                    <td class="border">{{$d->obat->nama_obat}}</td>
                                    <td class="border">{{Carbon\carbon::parse($d->tgl_masuk)->translatedformat('d F Y')}}</td>
                                    <td class="border">{{Carbon\carbon::parse($d->tgl_exp)->translatedformat('d F Y')}}</td>
                                    <td class="text-center border">{{$d->volume}} {{$d->obat->satuan->satuan}}</td>
                                </tr>
                                @endforeach
                                <tr class="bg-primary">
                                    <td colspan="5" class="text-center border">Total</td>
                                    <td class="text-center border">{{$stok->sum('volume')}} {{$data->satuan->satuan}}</td>
                                </tr>
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