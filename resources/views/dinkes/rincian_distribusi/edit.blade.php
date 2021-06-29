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
                        <form action="{{Route('userDinkes.distribusi.update',$data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for=""> Puskesmas</label>
                            <select name="puskesmas_id" id="" class="form-control">
                                @foreach($puskesmas as $p)
                                <option value="{{$p->id}}" {{ $data->puskesmas_id == $p->id ? "selected":"" }}>{{$p->user->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=""> Kode Distribusi</label>
                            <input type="text" class="form-control" name="kode_distribusi" value="{{$data->kode_distribusi}}">
                        </div>
                        <div class="form-group">
                            <label for=""> Tanggal Distribusi</label>
                            <input type="date" class="form-control" name="tgl_distribusi" value="{{Carbon\carbon::parse($data->tgl_distribusi)->format('Y-m-d')}}">
                        </div>
                        <div class="form-group">
                            <label for=""> Status Pendistribusian</label>
                            <select name="status_distribusi" class="form-control">
                                <option value="1" {{ $data->status_distribusi == 1 ? "selected":"" }}>Rutin</option>
                                <option value="2" {{ $data->status_distribusi == 2 ? "selected":"" }}>Permintaan</option>
                            </select>
                        </div>
                    </div>
                    <div class="ibox-footer text-right">
                        <a href="{{Route('userDinkes.kategori.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Batal</a>
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
