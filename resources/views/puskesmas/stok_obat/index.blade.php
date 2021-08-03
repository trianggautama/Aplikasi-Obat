@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Stok obat</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Stok obat</a>
                </li>
                <li class="breadcrumb-item">
                    <strong>Data</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8 text-right">
            <a href="{{Route('userPuskesmas.report.stok_puskesmas')}}" class="btn btn-info mt-4" target="_blank"><i class=" fa fa-print"></i> Cetak Data</a>
        </div>
    </div>
 
      <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Tabel Data</h5>
                    </div> 
                    <div class="ibox-content">
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Jenis Obat</th>
                                    <th>Dosis</th>
                                    <th>Kategori Obat</th>
                                    <th>Volume</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->kode_obat}}</td>
                                    <td>{{$d->nama_obat}}</td>
                                    <td>{{$d->jenis_obat}}</td>
                                    <td>{{$d->dosis}}</td>
                                    <td>{{$d->kategori->kategori}}</td>
                                    <td>{{$d->stok_puskesmas->where('puskesmas_id',Auth::user()->puskesmas->id)->sum('volume')}} {{$d->satuan->satuan}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-info" href="{{Route('userPuskesmas.stok_puskesmas.show',$d->id)}}"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>
                                    </td> 
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

@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
