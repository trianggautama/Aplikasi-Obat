@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Pemusnahan Obat</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Puskesmas</a>
                </li>
                <li class="breadcrumb-item">
                    <strong>Pemusnahan  Obat</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{Route('userPuskesmas.report.pemusnahan_obat_puskesmas.filter')}}" class="btn btn-info" ><i class=" fa fa-print"></i>  Filter Cetak Data</a>
                <a href="{{Route('userPuskesmas.report.pemusnahan_obat_puskesmas')}}" class="btn btn-info" target="_blank"><i class=" fa fa-print"></i> Cetak Data</a>
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
                                    <th>Tanggal Pemusnahan</th>
                                    <th>Volume</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{Carbon\carbon::parse($d->tanggal_pemusnahan)->translatedFormat('d F Y')}}</td>
                                    <td>{{$d->rincian->sum('volume')}} obat</td>
                                    <td>
                                        @if($d->status == 0)
                                        <div class="badge badge-warning"> Belum di verifikasi</div>
                                        @else
                                        <div class="badge badge-primary"> Teverifikasi</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('userPuskesmas.pemusnahan_obat_puskesmas.destroy',$d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-info" href="{{Route('userPuskesmas.pemusnahan_obat_puskesmas.show',$d->id)}}"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>
                                            @if($d->status == 0)
                                            <a class="btn btn-warning" href="{{Route('userPuskesmas.pemusnahan_obat_puskesmas.edit',$d->id)}}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                            <button class="btn btn-danger " type="submit"><i class="fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
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
                    <form action="{{Route('userPuskesmas.pemusnahan_obat_puskesmas.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Tanggal Pemusnahan</label>
                        <input type="date" name="tanggal_pemusnahan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="formAdd">Simpan Data</button>
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
