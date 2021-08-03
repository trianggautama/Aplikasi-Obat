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
                    <strong>Macam Obat</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{Route('userDinkes.report.obat')}}" class="btn btn-info" target="_blank"><i class=" fa fa-print"></i> Cetak Data</a>
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
                                    <th>Nama Obat</th>
                                    <th>Jenis Obat</th>
                                    <th>Dosis</th>
                                    <th>Kategori Obat</th>
                                    <th>Satuan Obat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->kode_obat}}</td>
                                    <td>{{$d->nama_obat}}</td>
                                    <td>{{$d->jenis_obat}}</td>
                                    <td>{{$d->dosis}}</td>
                                    <td>{{$d->kategori->kategori}}</td>
                                    <td>{{$d->satuan->satuan}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('userDinkes.obat.destroy',$d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <a class="btn btn-info" href="{{Route('userDinkes.obat.show',$d->id)}}"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>
                                                <a class="btn btn-primary" href="{{Route('userDinkes.obat.edit',$d->id)}}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                                <button class="btn btn-danger " type="submit"><i class="fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
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
                    <form action="{{Route('userDinkes.obat.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Kode Obat</label>
                        <input type="text" name="kode_obat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Obat</label>
                        <select name="jenis_obat" id="" class="form-control">
                            <option value="Pulvis">Pulvis</option>
                            <option value="Pulveres">Pulveres</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Pil">Pil</option>
                            <option value="Kapsul">Kapsul</option>
                            <option value="Kaplet">Kaplet</option>
                            <option value="Larutan">Larutan</option>
                            <option value="Suspensi">Suspensi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Dosis</label>
                        <input type="text" name="dosis" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Uraian</label>
                        <textarea name="uraian" id="" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori Obat</label>
                        <select name="kategori_obat_id" id="" class="form-control">
                            <option value="">-- pilih kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{$k->id}}">{{$k->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Satuan Obat</label>
                        <select name="satuan_obat_id" id="" class="form-control">
                            <option value="">-- pilih satuan --</option>
                            @foreach($satuan as $k)
                                <option value="{{$k->id}}">{{$k->satuan}}</option>
                            @endforeach
                        </select>
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
