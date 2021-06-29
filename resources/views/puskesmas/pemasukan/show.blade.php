@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Master Data</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Master Data</a>
                </li>
                <li class="breadcrumb-item">
                    <strong> Distribusi Obat</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Show</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{Route('userPuskesmas.pemasukan.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>

      <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Detail Distribusi</h5> 
                        </div>
                        <div class="ibox-content">
                            <table class="table table-striped">
                                <tr>
                                    <td width="17%">Kode Distribusi</td>
                                    <td width="3%">:</td>
                                    <td>{{$data->kode_distribusi}}</td>
                                </tr>
                                <tr>
                                    <td width="17%">Puskesmas Tujuan</td>
                                    <td width="3%">:</td>
                                    <td>{{$data->puskesmas->user->nama}}</td>
                                </tr>
                                <tr>
                                    <td width="17%">Tanggal Distribusi</td>
                                    <td width="3%">:</td>
                                    <td>{{Carbon\carbon::parse($data->tgl_distribusi)->translatedFormat('d F Y')}}</td>
                                </tr>
                                <tr>
                                    <td width="17%">Status Distribusi</td>
                                    <td width="3%">:</td>
                                    <td>@if($data->status_distribusi == 1) belum di verifikasi  @else terverifikasi  @endif</td>
                                </tr>
                                <tr>
                                    <td width="17%">Tanggal Diterima</td>
                                    <td width="3%">:</td>
                                    <td>{{$data->tgl_diterima}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Detail Distribusi</h5> 
                        </div>
                        <div class="ibox-content">
                            <hr>    
                            <div class="alert alert-light">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered bg-white" id="example">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Obat</td>
                                                <td>Kode Stok</td>
                                                <td>Tgl Exp</td>
                                                <td>Volume</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rincian as $r)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$r->stok_dinkes->obat->nama_obat}}</td>
                                                    <td>{{$r->stok_dinkes->kode_stok}}</td>
                                                    <td>{{Carbon\carbon::parse($r->stok_dinkes->tgl_exp)->translatedFormat('d F Y')}}</td>
                                                    <td>{{$r->volume}} {{$r->stok_dinkes->obat->satuan->satuan}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
