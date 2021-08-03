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
                    <strong>Distribusi Obat</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{Route('userDinkes.report.distribusi')}}" class="btn btn-info" target="_blank"><i class=" fa fa-print"></i> Cetak Data</a>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data</button>
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
                                    <th>puskesmas Tujuan</th>
                                    <th>Tanggal distribusi</th>
                                    <th>Status distribusi</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Banyak Jenis obat</th>
                                    <th class="text-center">Aksi</th>
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
                                    <td>
                                        <form action="{{ route('userDinkes.distribusi.destroy',$d->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{Route('userDinkes.distribusi.show',$d->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-info-circle"></i> Detail</a>
                                        @if($d->status_distribusi == 1)
                                            <a href="{{Route('userDinkes.distribusi.edit',$d->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                            <button class="btn btn-sm btn-danger " type="submit"><i class="fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
                                        @endif
                                        </form>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{Route('userDinkes.distribusi.store')}}" method="POST" name="formAdd">
                    @csrf
                    <div class="form-group">
                        <label for=""> Puskesmas</label>
                        <select name="puskesmas_id" id="" class="form-control">
                            @foreach($puskesmas as $p)
                            <option value="{{$p->id}}">{{$p->user->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""> Kode Distribusi</label>
                        <input type="text" class="form-control" name="kode_distribusi">
                    </div>
                    <div class="form-group">
                        <label for=""> Tanggal Distribusi</label>
                        <input type="date" class="form-control" name="tgl_distribusi" value="{{Carbon\carbon::now()->format('Y-m-d')}}">
                    </div>
                    <div class="form-group">
                        <label for=""> Status Pendistribusian</label>
                        <select name="status_distribusi" class="form-control">
                            <option value="1">Rutin</option>
                            <option value="2">Permintaan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="formAdd">Buat Data Distribusi</button>
                </div>
                </form>
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
