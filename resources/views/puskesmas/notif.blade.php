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
                    <strong>Notifikasi</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        @if($notif->isEmpty())
            <div class="card">
                <div class="card-body text-center">
                <h4>Tidak Ada notifikasi</h4>
                </div>
            </div>
            @else
            @foreach($notif as $n)
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-1">
                            <h2 class="fa fa-bell"></h2>
                        </div>
                        <div class="col-md">
                            <h5 class="card-title">{{$n->data['judul']}} <small>( {{\carbon\carbon::parse($n->created_at)->diffForHumans()}} )</small> 
                                @if(!$n->read_at)<span class="badge badge-warning">belum dibaca</span>@endif
                            </h5>
                        </div>
                        <div class="col-md text-right">
                            <a href="{{route('userPuskesmas.notif.detail',['notif_id'=>$n->id,'id'=>$n->data['id']])}}" class="btn btn-primary text-white">
                                <i class="fa fa-info-circle"></i>
                            </a>                    
                            <a href="{{Route('userPuskesmas.notif.delete',['id'=>$n->id])}}" type="button" class="btn btn-secondary text-white">
                                <i class="fa fa-trash"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <br>
            {{$notif->links()}}
        @endif
    </div>
@endsection
@section('script')
   
@endsection
