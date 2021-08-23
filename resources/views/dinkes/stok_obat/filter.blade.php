@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Stok Obat Dinkes </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Stok Obat Dinkes</a>
                </li>
                <li class="breadcrumb-item">
                    <strong>Cetak</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Filter</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
            </div>
        </div>
    </div>

      <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Filter Waktu</h5> 
                    </div>
                    <div class="ibox-content">
                        <form action="{{Route('userDinkes.report.stok_obat_dinkes.filter.cetak')}}" method="GET" target="__blank">
                        <div class="form-group">
                            <label for=""> Tanggal Awal</label>
                            <input type="date" class="form-control" name="tgl_awal" value="">
                        </div>
                        <div class="form-group">   
                            <label for=""> Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tgl_akhir" value="">
                        </div>
                    </div>
                    <div class="ibox-footer text-right">
                        <a href="{{Route('userDinkes.stok_dinkes.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Batal</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cetak Data</button>
                    </div>
                    </form>
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
