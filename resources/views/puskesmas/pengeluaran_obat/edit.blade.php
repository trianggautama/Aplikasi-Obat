@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Pengeluaran Obat</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Puskesmas</a>
                </li>
                <li class="breadcrumb-item">
                    <strong>Pengeluaran Obat</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Edit</strong>
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
                        <form action="{{Route('userPuskesmas.pengeluaran_puskesmas.update',$data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$data->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="">Diagnosa</label>
                            <input type="text" name="diagnosa" class="form-control" value="{{$data->diagnosa}}">
                        </div>
                    </div>
                    <div class="ibox-footer text-right">
                        <a href="{{Route('userPuskesmas.pengeluaran_puskesmas.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Batal</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
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
