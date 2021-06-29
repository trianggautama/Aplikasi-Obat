@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>User Puskesmas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">user puskesmas</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>profil</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i> Edit Profil</button>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td width="17%">Nama Puskesmas</td>
                        <td width="3%">:</td>
                        <td>{{Auth::user()->nama}}</td>
                    </tr>
                    <tr>
                        <td width="17%">Alamat Puskesmas</td>
                        <td width="3%">:</td>
                        <td>{{Auth::user()->puskesmas->alamat}}</td>
                    </tr>
                    <tr>
                        <td width="17%">No Tlp</td>
                        <td width="3%">:</td>
                        <td>{{Auth::user()->puskesmas->no_hp}}</td>
                    </tr>
                    <tr>
                        <td width="17%">Nama Pimpinan</td>
                        <td width="3%">:</td>
                        <td>{{Auth::user()->puskesmas->nama_pimpinan}}</td>
                    </tr>
                    <tr>
                        <td width="17%">NIP Pimpinan</td>
                        <td width="3%">:</td>
                        <td>{{Auth::user()->puskesmas->nip_pimpinan}}</td>
                    </tr>
                    <tr>
                        <td width="17%">Jabatan Pimpinan</td>
                        <td width="3%">:</td>
                        <td>{{Auth::user()->puskesmas->jabatan_pimpinan}}</td>
                    </tr>
                    <tr>
                        <td width="17%">Username</td>
                        <td width="3%">:</td>
                        <td>{{Auth::user()->username}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{Route('userPuskesmas.profil_update',Auth::user()->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" class="form-control">{{Auth::user()->puskesmas->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="text" name="no_hp" id="" class="form-control" value="{{Auth::user()->puskesmas->no_hp}}" />
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pimpinan</label>
                        <input type="text" name="nama_pimpinan" id="" class="form-control" value="{{Auth::user()->puskesmas->nama_pimpinan}}" />
                    </div>
                    <div class="form-group">
                        <label for="">NIP Pimpinan</label>
                        <input type="text" name="nip_pimpinan" id="" class="form-control" value="{{Auth::user()->puskesmas->nip_pimpinan}}" />
                    </div>
                    <div class="form-group">
                        <label for="">Jabatan Pimpinan</label>
                        <input type="text" name="jabatan_pimpinan" id="" class="form-control" value="{{Auth::user()->puskesmas->jabatan_pimpinan}}" />
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" id="" class="form-control" value="{{Auth::user()->username}}" />
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
   
@endsection
