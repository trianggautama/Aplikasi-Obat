@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Stok obat</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Stok obat</a>
                </li>
                <li class="breadcrumb-item">
                    <strong> Detail</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{Route('userPuskesmas.stok_puskesmas.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>

      <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Detail Obat</h5> 
                    </div>
                    <div class="ibox-content">
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
                    </div>
                </div>
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Stok Gudang Dinkes</h5> 
                    </div>
                    <div class="ibox-content">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>tgl Masuk</th>
                                    <th>Tgl Expired</th>
                                    <th class="text-center">volume</th>
                                </tr>
                            </thead> 
                            <tbody>  
                                @foreach($data->stok_puskesmas as $d)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$d->obat->kode_obat}}</td>
                                    <td>{{$d->obat->nama_obat}}</td>
                                    <td>{{Carbon\carbon::parse($d->tgl_masuk)->translatedformat('d F Y')}}</td>
                                    <td>{{Carbon\carbon::parse($d->tgl_exp)->translatedformat('d F Y')}}</td>
                                    <td class="text-center">{{$d->volume}} {{$d->obat->satuan->satuan}}</td>
                                </tr>
                                @endforeach
                                <tr class="bg-primary">
                                    <td colspan="5" class="text-center">Total</td>
                                    <td class="text-center">{{$data->stok_puskesmas->sum('volume')}} {{$data->satuan->satuan}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>

@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
