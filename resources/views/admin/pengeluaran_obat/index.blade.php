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
                    <strong>Pengeluaran Obat Puskesmas</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data</strong>
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
                        <h5>Tabel Data</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Puskesmas</th>
                                    <th>No Hp</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($puskesmas as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->user->nama}}</td>
                                    <td>{{$d->no_hp}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-info" href="{{Route('userAdmin.pengeluaran_obat.data',$d->id)}}"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>
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
