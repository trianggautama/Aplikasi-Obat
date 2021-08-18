@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Beranda Admin</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Admin</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Beranda</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row mt-3">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h2>Selamat Datang ( {{Auth::user()->nama}} )</h2>
                        <p>Di aplikasi Pendistribusian Obat Dinas Kesehatan Kota Banjarbaru</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
   
@endsection
