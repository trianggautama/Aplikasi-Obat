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
                    <strong>User Puskesmas</strong>
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
                        <form action="{{Route('userAdmin.puskesmas.update',$data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$data->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="" class="form-control" >{{$data->puskesmas->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">No Hp</label>
                            <input type="text" name="no_hp" class="form-control" value="{{$data->puskesmas->no_hp}}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pimpinan</label>
                            <input type="text" name="nama_pimpinan" class="form-control" value="{{$data->puskesmas->nama_pimpinan}}">
                        </div>
                        <div class="form-group">
                            <label for="">NIP Pimpinan</label>
                            <input type="text" name="nip_pimpinan" class="form-control" value="{{$data->puskesmas->nip_pimpinan}}">
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan Pimpinan</label>
                            <input type="text" name="jabatan_pimpinan" class="form-control" value="{{$data->puskesmas->jabatan_pimpinan}}">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="{{$data->username}}">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                            <small class="text-danger">isi jika ingin merubah password</small>
                        </div>
                    </div>
                    <div class="ibox-footer text-right">
                        <a href="{{Route('userAdmin.dinkes.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Batal</a>
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
