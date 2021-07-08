@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Pemasukan Obat</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Pemasukan Obat</a>
                </li>
                <li class="breadcrumb-item">
                    <strong>Pemasukan Obat</strong>
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
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode distribusi</th>
                                    <th>Tanggal distribusi</th>
                                    <th>Status distribusi</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Banyak Jenis obat</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->kode_distribusi}}</td>
                                    <td> {{Carbon\carbon::parse($d->tgl_distribusi)->translatedFormat('d F Y')}}</td>
                                    <td>@if($d->status_distribusi == 1) belum di verifikasi  @else terverifikasi  @endif</td>
                                    <td>@if($d->tgl_diterima) {{Carbon\carbon::parse($d->tgl_diterima)->translatedFormat('d F Y')}} @else - @endif</td>
                                    <td>{{$d->rincian->count()}} Jenis Stok Obat</td>
                                    <td>@if($d->status_distribusi == 1) <div class="badge badge-warning">belum di verifikasi</div>  @else <div class="badge badge-success">terverifikasi</div>  @endif</td>
                                    <td>
                                        <a href="{{Route('userPuskesmas.pemasukan.show',$d->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-info-circle"></i> Detail</a>
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

    let verif = (id, kode_distribusi) =>{
        console.log(id, kode_distribusi);
        $('#kode_distribusi').val(kode_distribusi);
        $('#verif').modal('show');
    }
</script>
@endsection
