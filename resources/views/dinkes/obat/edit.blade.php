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
                    <strong>Kategori Obat</strong>
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
                        <form action="{{Route('userDinkes.obat.update',$data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <label for="">Kode Obat</label>
                        <input type="text" name="kode_obat" class="form-control" value="{{$data->kode_obat}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" value="{{$data->nama_obat}}">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Obat</label>
                        <select name="jenis_obat" id="" class="form-control">
                            <option value="Pulvis" {{ $data->jenis_obat == 'Pulvis' ? "selected":"" }}>Pulvis</option>
                            <option value="Pulveres" {{ $data->jenis_obat == 'Pulveres' ? "selected":"" }}>Pulveres</option>
                            <option value="Tablet" {{ $data->jenis_obat == 'Tablet' ? "selected":"" }}>Tablet</option>
                            <option value="Pil" {{ $data->jenis_obat == 'Pil' ? "selected":"" }}>Pil</option>
                            <option value="Kapsul" {{ $data->jenis_obat == 'Kapsul' ? "selected":"" }}>Kapsul</option>
                            <option value="Kaplet" {{ $data->jenis_obat == 'Kaplet' ? "selected":"" }}>Kaplet</option>
                            <option value="Larutan" {{ $data->jenis_obat == 'Larutan' ? "selected":"" }}>Larutan</option>
                            <option value="Suspensi" {{ $data->jenis_obat == 'Suspensi' ? "selected":"" }}>Suspensi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Dosis</label>
                        <input type="text" name="dosis" class="form-control" value="{{$data->dosis}}">
                    </div>
                    <div class="form-group">
                        <label for="">Uraian</label>
                        <textarea name="uraian" id="" class="form-control">{{$data->uraian}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori Obat</label>
                        <select name="kategori_obat_id" id="" class="form-control">
                            <option value="">-- pilih kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{$k->id}}" {{ $data->kategori_obat_id == $k->id ? "selected":"" }}>{{$k->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Satuan Obat</label>
                        <select name="satuan_obat_id" id="" class="form-control">
                            <option value="">-- pilih satuan --</option>
                            @foreach($satuan as $s)
                                <option value="{{$s->id}}" {{ $data->satuan_obat_id == $s->id ? "selected":"" }}>{{$s->satuan}}</option>
                            @endforeach
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
