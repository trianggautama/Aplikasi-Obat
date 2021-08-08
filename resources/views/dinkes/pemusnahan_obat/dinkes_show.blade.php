@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Pemusnahan Obat</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dinkes</a>
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
                <a href="{{Route('userPuskesmas.report.pemusnahan_obat_detail',$data->id)}}" class="btn btn-info" target="_blank"><i class=" fa fa-print"></i> Cetak Data</a>
                <a href="{{Route('userDinkes.pemusnahan_obat_dinkes.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                            <form action="{{Route('userPuskesmas.rincian_pemusnahan.store')}}" method="post">
                            @csrf
                                <input type="hidden" name="pemusnahan_obat_id" id="pemusnahan_obat_id" value="{{$data->id}}">
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
                                                            <form action="{{ route('userPuskesmas.rincian_pemusnahan.destroy',$r->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger " type="submit"><i class="fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
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
