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
                    <strong>Pemusnahan</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Show</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
            @if($data->status == 0)
                <a class="btn btn-success text-white" href="{{Route('userDinkes.pemusnahan_obat_dinkes.verifikasi',$data->id)}}"><i class="fa fa-check"></i> Verifikasi Data</a>
            @endif
            <a href="{{Route('userPuskesmas.report.pemusnahan_obat_detail',$data->id)}}" class="btn btn-info" target="_blank"><i class=" fa fa-print"></i> Cetak Data</a>
                <a href="{{Route('userDinkes.pemusnahan_obat_dinkes.puskesmas_index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div> 
        </div>
    </div>

      <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Detail Obat</h5> 
                        </div>
                        <div class="ibox-content">
                            <table class="table table-striped">
                                <tr>
                                    <td width="17%">Puskesmas</td>
                                    <td width="3%">:</td>
                                    <td>{{$data->puskesmas->user->nama}}</td>
                                </tr>
                                <tr>
                                    <td width="17%">Tanggal Pemusnahan</td>
                                    <td width="3%">:</td>
                                    <td>{{Carbon\carbon::parse($data->tanggal_pemusnahan)->translatedFormat('d F Y')}}</td>
                                </tr>
                                <tr>
                                    <td width="17%">Status</td>
                                    <td width="3%">:</td>
                                    <td>
                                        @if($data->status == 0)
                                        <div class="badge badge-warning"> Belum di verifikasi</div>
                                        @else
                                        <div class="badge badge-primary"> Teverifikasi</div>
                                        @endif
                                    </td>
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
                            <hr>    
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rincian as $r)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$r->stok_puskesmas->obat->nama_obat}}</td>
                                                    <td>{{$r->stok_puskesmas->kode_stok}}</td>
                                                    <td>{{Carbon\carbon::parse($r->stok_puskesmas->tgl_exp)->translatedFormat('d F Y')}}</td>
                                                    <td>{{$r->volume}} {{$r->stok_puskesmas->obat->satuan->satuan}}</td>
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
        let url       = '{{Route("userPuskesmas.stok_puskesmas.api","")}}'
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