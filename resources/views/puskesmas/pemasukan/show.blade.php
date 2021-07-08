@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Pemasukan Obat</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <strong> Puskesmas</strong>
                </li>
                <li class="breadcrumb-item">
                    <strong> Pemasukan obat</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Show</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                @if($data->status_distribusi == 1)
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-check-circle-o"></i> Verifikasi pemasukan Obat</button>
                @endif
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
                                    <td>@if($data->status_distribusi == 1) <div class="badge badge-warning">belum di verifikasi</div>  @else <div class="badge badge-success">terverifikasi</div>  @endif</td>
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
                    <form action="{{Route('userPuskesmas.pemasukan.verif',$data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Tanggal Diterima</label>
                        <input type="date" name="tgl_diterima" class="form-control" value="{{Carbon\carbon::now()->format('Y-m-d')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Catatan (optional)</label>
                        <textarea name="catatan" id="" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="formAdd">Simpan Verifikasi</button>
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
