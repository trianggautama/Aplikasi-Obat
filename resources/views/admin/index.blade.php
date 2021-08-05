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
        <div class="row">
            <div class="col-md">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-8 text-right">
                            <span>User Dinas Kesehatan</span>
                            <h2 class="font-bold">3 User</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-8 text-right">
                            <span> User Puskesmas </span>
                            <h2 class="font-bold">30 User</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-file-text fa-5x"></i>
                        </div> 
                        <div class="col-8 text-right">
                            <span> Jenis Obat </span>
                            <h2 class="font-bold">12</h2>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md"><div class="widget style1 red-bg">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-truck fa-5x"></i>
                        </div>
                        <div class="col-8 text-right">
                            <span> pendistribusian Obat </span>
                            <h2 class="font-bold">12</h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
