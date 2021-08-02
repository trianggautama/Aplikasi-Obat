@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Beranda</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Psuskesmas</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Beranda</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
    <div class="row">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('depan/img/hero-area.jpg')}}" alt="" width="100%" height="55%">
                    <br>
                    <div class="text-center p-4">
                        <h1>Visi dan Misi</h1>
                        <p >Dinas Kesehatan Kota Banjarbaru memiliki visi Terwujudnya pelayanan kesehatan yang holistik dan berkarakter, dengan sejumlah misi sebagai berikut: Meningkatkan kesehatan ibu dan anak serta gizi masyarakat, kesehatan lingkungan dan pemberdayaan masyarakat.</p>
                        <hr>                        
                        <h3>Selamat Datang, Admin Dinkes ( {{Auth::user()->nama}} )</h3>
                    </div>
                </div>
           </div>
       </div>
    </div>
@endsection
@section('script')
   
@endsection
