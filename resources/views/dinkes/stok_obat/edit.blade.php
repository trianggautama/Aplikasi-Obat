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
                    <strong>Satuan Obat</strong>
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
                        <form action="{{Route('userDinkes.stok_dinkes.update',$data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for=""> Obat</label>
                            <select name="obat_id" id="" class=" form-control">
                                <option value="">-- pilih obat --</option>
                                @foreach($obat as $o)
                                    <option value="{{$o->id}}" {{ $data->obat_id == $o->id ? "selected":"" }}>{{$o->nama_obat}} - {{$o->dosis}} - {{$o->jenis_obat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" class="form-control" value="{{$data->tgl_masuk}}">
                        </div>
                        <div class="form-group">
                            <label for="">Volume </label>
                            <input type="number" name="volume" class="form-control" value="{{$data->volume}}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Expired</label>
                            <input type="date" name="tgl_exp" class="form-control" value="{{$data->tgl_exp}}">
                        </div>
                    </div>
                    <div class="ibox-footer text-right">
                        <a href="{{Route('userDinkes.stok_dinkes.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Batal</a>
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
