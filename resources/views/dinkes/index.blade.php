@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Beranda</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Admin</a>
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
            <div class="col-md">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-file-text fa-5x"></i>
                        </div>
                        <div class="col-8 text-right">
                            <span>Macam obat</span>
                            <h3 class="font-bold">3 Jenis</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-medkit fa-5x"></i>
                        </div>
                        <div class="col-8 text-right">
                            <span>Stok obat </span>
                            <h3 class="font-bold">30 obat</h3>
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
                            <span>Distribusi Obat </span>
                            <h3 class="font-bold">12 Pendistribusian</h3>
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
                            <span>Pemusnahan Obat </span>
                            <h3 class="font-bold">12 Pemusnahan</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h2>Selamat Datang, Admin Dinkes ( {{Auth::user()->nama}} )</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores nostrum, minima numquam magni cum veniam necessitatibus optio rerum iure odio sequi doloribus ex architecto, error nesciunt laudantium possimus nulla est.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
   
@endsection
