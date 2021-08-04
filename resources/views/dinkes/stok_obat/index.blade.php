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
                    <strong>Stok Obat</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{Route('userDinkes.report.stok_obat_dinkes')}}" class="btn btn-info" target="_blank"><i class=" fa fa-print"></i> Cetak Data</a>
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
                                    <th>Kode Obat</th>
                                    <th>Kode Stok</th>
                                    <th>Nama Obat</th>
                                    <th>tgl Masuk</th>
                                    <th>volume</th>
                                    <th>Tgl Expired</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->obat->kode_obat}}</td>
                                    <td>{{$d->kode_stok}}</td>
                                    <td>{{$d->obat->nama_obat}}</td>
                                    <td>{{Carbon\carbon::parse($d->tgl_masuk)->translatedformat('d F Y')}}</td>
                                    <td>{{$d->volume}} {{$d->obat->satuan->satuan}}</td>
                                    <td><span class="badge @if($d->status_exp == 0) badge-danger @elseif($d->status_exp == 1) badge-warning @else badge-success @endif" >{{Carbon\carbon::parse($d->tgl_exp)->translatedformat('d F Y')}}</span></td>
                                    <td class="text-center">
                                        <form action="{{ route('userDinkes.stok_dinkes.destroy',$d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <!-- <a class="btn btn-info" href="{{Route('userDinkes.stok_dinkes.show',$d->id)}}"><i class="fa fa-info-circle"></i>&nbsp;Detail</a> -->
                                                <a class="btn btn-primary" href="{{Route('userDinkes.stok_dinkes.edit',$d->id)}}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                                <button class="btn btn-danger " type="submit"><i class="fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <h5>Keterangan :</h5>
                        <ul>
                            <li><div class="badge badge-success">Aman</div></li>
                            <li><div class="badge badge-warning">Mendekati Kadaluarsa (3 Bulan)</div></li>
                            <li><div class="badge badge-danger">kadaluarsa</div></li>
                        </ul>
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
                    <form action="{{Route('userDinkes.stok_dinkes.store')}}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for=""> Obat</label>
                        <select name="obat_id" id="" class=" form-control">
                            <option value="">-- pilih obat --</option>
                            @foreach($obat as $o)
                                <option value="{{$o->id}}">{{$o->nama_obat}} - {{$o->dosis}} - {{$o->jenis_obat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Masuk</label>
                        <input type="date" name="tgl_masuk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Volume </label>
                        <input type="number" name="volume" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Expired</label>
                        <input type="date" name="tgl_exp" class="form-control">
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
