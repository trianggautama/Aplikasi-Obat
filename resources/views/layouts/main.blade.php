<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aplikasi Distribusi Obat</title>

    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
</head>

<body class="">
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element text-center">
                        <img alt="image" class="rounded-circle" src="{{asset('user.png')}}" width="50px"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{Auth::user()->nama}}</span>
                            <span class="text-muted text-xs block">{{Auth::user()->role}}</span>
                        </a>
                    </div>
                    <div class="logo-element">
                        <img src="{{asset('pemko.png')}}" alt="" width="30px">
                    </div>
                </li>
                @if(Auth::user()->role ==  'SuperAdmin')
                <li>
                    <a href="{{Route('userAdmin.beranda')}}"><i class="fa fa-home"></i> <span class="nav-label">Beranda </span></a>
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Master Data</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{Route('userAdmin.dinkes.index')}}">Admin Dinkes</a></li>
                        <li><a href="{{Route('userAdmin.puskesmas.index')}}">Puskesmas</a></li>
                    </ul>
                </li>
                @endif
               
                @if(Auth::user()->role ==  'Dinkes')
                    <li>
                        <a href="{{Route('userDinkes.beranda')}}"><i class="fa fa-home"></i> <span class="nav-label">Beranda </span></a>
                    </li>
                    <li> 
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Master Data</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{Route('userDinkes.puskesmas.index')}}">User Puskesmas</a></li>
                            <li><a href="{{Route('userDinkes.satuan.index')}}">Satuan Obat</a></li>
                            <li><a href="{{Route('userDinkes.kategori.index')}}">Kategori Obat</a></li>
                            <li><a href="{{Route('userDinkes.obat.index')}}">Macam Obat</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Obat</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{Route('userDinkes.stok_dinkes.index')}}">Stok Obat</a></li>
                            <li><a href="{{Route('userDinkes.distribusi.index')}}">Pendistribusian Obat</a></li>
                            <li><a href="{{Route('userDinkes.pemusnahan_obat_dinkes.index')}}">Pemusnahan Obat Dinkes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Laporan Puskesmas</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <!-- <li><a href="dashboard_2.html">Pengeluaran Obat <small>(belum)</small></a></li> -->
                            <li><a href="{{Route('userDinkes.pemusnahan_obat_dinkes.puskesmas_index')}}">Pemusnahan Obat</a></li> 
                        </ul>
                    </li>
                    <!-- <li class="">
                        <a href="package.html"><i class="fa fa-print"></i> <span class="nav-label">Laporan <small>(belum)</small></span></a>
                    </li> -->
                @endif
                @if(Auth::user()->role ==  'Puskesmas')
                <li>
                    <a href="{{Route('userPuskesmas.beranda')}}"><i class="fa fa-home"></i> <span class="nav-label">Beranda </span></a>
                </li>
                <li>
                    <a href="{{Route('userPuskesmas.profil')}}"><i class="fa fa-user"></i> <span class="nav-label">Profil </span></a>
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Obat</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{Route('userPuskesmas.stok_puskesmas.index')}}">Stok Obat</a></li>
                        <li><a href="{{Route('userPuskesmas.pemasukan.index')}}">Pemasukan Obat</a></li>
                        <li><a href="{{Route('userPuskesmas.pengeluaran_puskesmas.index')}}">Pengeluaran Obat</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Lain-lain</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{Route('userPuskesmas.pemusnahan_obat_puskesmas.index')}}">Pemusnahan Obat</a></li>
                    </ul>
                </li>
                @endif
            </ul>

        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
               <p class="mt-3">Dinkes Kota Banjarbaru</p>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">  
                <li class="dropdown">
                    @php
                        $notif = Auth::user()->unreadNotifications;
                    @endphp
                    @if(Auth::user()->role == 'Dinkes')
                        <a class="count-info" href="{{Route('userDinkes.notif')}}">
                            <i class="fa fa-bell"></i>  <span class="label label-warning">{{$notif->count()}}</span>
                        </a>
                    @elseif(Auth::user()->role == 'Puskesmas')
                        <a class="count-info" href="{{Route('userPuskesmas.notif')}}">
                            <i class="fa fa-bell"></i>  <span class="label label-warning">{{$notif->count()}}</span>
                        </a>
                    @endif
                </li>
                <li>
                    <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

        </nav>
        </div>
        @yield('content')
            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>
        </div>
        </div>

    <!-- Mainly scripts -->
    <script src="{{asset('admin/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.js')}}"></script>
    <script src="{{asset('admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('admin/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('admin/js/inspinia.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('admin/axios.min.js')}}" ></script>
    <script>
    </script>
    @yield('script')
    @include('layouts.alert')            
</body>
</html>
