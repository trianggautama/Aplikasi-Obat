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
                    <strong> Distribusi Obat</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Show</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{Route('userDinkes.distribusi.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                                    <td>{{Carbon\carbon::parse($data->tgl_diterima)->translatedFormat('d F Y')}}</td>
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
                            @if($data->status_distribusi == 1)
                            <form action="{{Route('userDinkes.rincian_distribusi.store')}}" method="post">
                            @csrf
                                <input type="hidden" name="distribusi_obat_id" id="distribusi_obat_id" value="{{$data->id}}">
                                <div class="form-group">
                                    <label for="">Stok obat</label>
                                    <select name="stok_dinkes_id" id="stok_obat_id" class="form-control">
                                        <option value="">-- pilih stok --</option>
                                        @foreach($stok as $s)
                                            <option value="{{$s->id}}">{{$s->kode_stok}}.{{$s->obat->nama_obat}} (exp. {{Carbon\carbon::parse($s->tgl_exp)->translatedFormat('d F Y')}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Volume ( <small id="satuan">Satuan</small> )</label>
                                    <input type="number" name="volume" class="form-control" id="volume">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" >Tambah Rincian</button>
                            </form>
                            <hr>    
                            @endif
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
                                                <td class="text-center">Aksi</td>
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
                                                    <td class="text-center">
                                                        @if($data->status_distribusi == 1)
                                                            <form action="{{ route('userDinkes.rincian_distribusi.destroy',$r->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <!-- <a href="{{Route('userDinkes.rincian_distribusi.edit',$r->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</a> -->
                                                                <button class="btn btn-sm btn-danger " type="submit"><i class="fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
                                                            </form>
                                                        @else
                                                        -
                                                        @endif
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
        </div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

    $( "#stok_obat_id" ).change(function() {
        let id        =   $( "#stok_obat_id" ).val();
        let url       = '{{Route("userDinkes.stok_dinkes.show","")}}'
        axios.get( `${url}/${id} `)
        .then(function (response) {
            console.log(response.data);     
            $('#volume').val(response.data.volume)
            $('#volume').attr('max',response.data.volume)
            $('#satuan').text(response.data.satuan)
        })
        .catch(function (error) {
            console.log(error);
        })
    });
</script>
@endsection
