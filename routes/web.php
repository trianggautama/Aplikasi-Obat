<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    MainController,AuthController,UserPuskesmasController,DistribusiController,PemasukanPuskesmasController, PemusnahanObatController, StokPuskesmasController,ReportController,
    AdminPemasukanObatController,AdminPengeluaranObatController
};

// Route::get('/', [MainController::class, 'depan'])->name('depan'); 
Route::get('/', [AuthController::class, 'login'])->name('login'); 
Route::post('/', [AuthController::class, 'login_store'])->name('loginStore'); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

Route::prefix('/user-admin')->name('userAdmin.')->middleware('auth')->group(function (){
    Route::get('/beranda', [MainController::class, 'admin_beranda'])->name('beranda'); 
    Route::resource('dinkes', '\App\Http\Controllers\UserDinkesController');
    Route::resource('puskesmas', '\App\Http\Controllers\UserPuskesmasController');  
    Route::resource('satuan', '\App\Http\Controllers\SatuanObatController');
    Route::resource('kategori', '\App\Http\Controllers\KategoriObatController'); 
    Route::resource('obat', '\App\Http\Controllers\ObatController'); 

    Route::resource('stok_dinkes', '\App\Http\Controllers\StokDinkesController');
    Route::resource('distribusi', '\App\Http\Controllers\DistribusiController');
    Route::post('distribusi/obat/', [DistribusiController::class, 'tambah'])->name('distribusi.tambah');     
    Route::resource('rincian_distribusi', '\App\Http\Controllers\RincianDistribusiController');

    Route::prefix('/pemusnahan_obat_dinkes')->name('pemusnahan_obat_dinkes.')->group(function (){ 
        Route::get('/dinkes', [PemusnahanObatController::class, 'pemusnahan_dinkes'])->name('index');  
        Route::get('/puskesmas', [PemusnahanObatController::class, 'dinkes_index'])->name('puskesmas_index'); 
        Route::get('/dinkes-show/{id}', [PemusnahanObatController::class, 'pemusnahan_dinkes_show'])->name('dinkes_show'); 
        Route::get('/edit/{id}', [PemusnahanObatController::class, 'dinkes_edit'])->name('edit');  
        Route::put('/edit/{id}', [PemusnahanObatController::class, 'dinkes_update'])->name('update');
        Route::get('/show/{id}', [PemusnahanObatController::class, 'dinkes_show'])->name('show'); 
        Route::get('/verifikasi/{id}', [PemusnahanObatController::class, 'verifikasi'])->name('verifikasi');  
    });

    Route::resource('pemasukan_obat', '\App\Http\Controllers\AdminPemasukanObatController');
    Route::get('/pemasukan_obat/data/{id}', [AdminPemasukanObatController::class, 'data'])->name('pemasukan_obat.data');  

    Route::resource('pengeluaran_obat', '\App\Http\Controllers\AdminPengeluaranObatController');
    Route::get('/pengeluaran_obat/data/{id}', [AdminPengeluaranObatController::class, 'data'])->name('pengeluaran_obat.data');  

});

Route::prefix('/user-dinkes')->name('userDinkes.')->middleware('auth')->group(function (){
    Route::get('/beranda', [MainController::class, 'admin_dinkes'])->name('beranda'); 
    Route::get('/notif', [MainController::class, 'dinkes_notif'])->name('notif'); 
    Route::get('/notif/{notif_id}/{id}', [MainController::class, 'dinkes_notif_detail'])->name('notif.detail'); 
    Route::get('/notif/delete/{id}', [MainController::class, 'dinkes_notif_delete'])->name('notif.delete'); 

    Route::prefix('/puskesmas')->name('puskesmas.')->group(function (){
        Route::get('/', [UserPuskesmasController::class, 'dinkes_index'])->name('index');     
        Route::get('/{id}', [UserPuskesmasController::class, 'dinkes_show'])->name('show');     
    });
    Route::resource('satuan', '\App\Http\Controllers\SatuanObatController');
    Route::resource('kategori', '\App\Http\Controllers\KategoriObatController'); 
    Route::resource('obat', '\App\Http\Controllers\ObatController'); 
    Route::resource('stok_dinkes', '\App\Http\Controllers\StokDinkesController');
    Route::resource('distribusi', '\App\Http\Controllers\DistribusiController');
    Route::post('distribusi/obat/', [DistribusiController::class, 'tambah'])->name('distribusi.tambah');     
    Route::resource('rincian_distribusi', '\App\Http\Controllers\RincianDistribusiController');
 
    Route::prefix('/pemusnahan_obat_dinkes')->name('pemusnahan_obat_dinkes.')->group(function (){ 
        Route::get('/dinkes', [PemusnahanObatController::class, 'pemusnahan_dinkes'])->name('index');  
        Route::get('/puskesmas', [PemusnahanObatController::class, 'dinkes_index'])->name('puskesmas_index'); 
        Route::get('/dinkes-show/{id}', [PemusnahanObatController::class, 'pemusnahan_dinkes_show'])->name('dinkes_show'); 
        Route::get('/edit/{id}', [PemusnahanObatController::class, 'dinkes_edit'])->name('edit');  
        Route::put('/edit/{id}', [PemusnahanObatController::class, 'dinkes_update'])->name('update');
        Route::get('/show/{id}', [PemusnahanObatController::class, 'dinkes_show'])->name('show'); 
        Route::get('/verifikasi/{id}', [PemusnahanObatController::class, 'verifikasi'])->name('verifikasi'); 
    });

    Route::prefix('/report')->name('report.')->group(function (){
        Route::get('/obat', [ReportController::class, 'obat'])->name('obat'); 
        Route::get('/detail_obat/{id}', [ReportController::class, 'detail_obat'])->name('detail_obat'); 
        Route::get('/stok_obat_dinkes', [ReportController::class, 'stok_obat_dinkes'])->name('stok_obat_dinkes'); 
        Route::get('/distribusi', [ReportController::class, 'distribusi'])->name('distribusi'); 
        Route::get('/distribusi_detail/{id}', [ReportController::class, 'distribusi_detail'])->name('distribusi_detail'); 
        Route::get('/pemusnahan_obat_dinkes', [ReportController::class, 'pemusnahan_obat_dinkes'])->name('pemusnahan_obat_dinkes'); 
        Route::get('/pemusnahan_obat_dinkes2', [ReportController::class, 'pemusnahan_obat_dinkes2'])->name('pemusnahan_obat_dinkes2'); 
        Route::get('/distribusi/filter', [ReportController::class, 'distribusi_filter'])->name('distribusi.filter');  
        Route::get('/distribusi/filter/cetak', [ReportController::class, 'distribusi_filter_cetak'])->name('distribusi.filter.cetak'); 
        Route::get('/stok_obat_dinkes/filter', [ReportController::class, 'stok_obat_dinkes_filter'])->name('stok_obat_dinkes.filter'); 
        Route::get('/stok_obat_dinkes/filter/cetak', [ReportController::class, 'stok_obat_dinkes_filter_cetak'])->name('stok_obat_dinkes.filter.cetak'); 
        Route::get('/pemusnahan_obat_dinkes2/filter', [ReportController::class, 'pemusnahan_obat_dinkes2_filter'])->name('pemusnahan_obat_dinkes2.filter'); 
        Route::get('/pemusnahan_obat_dinkes2/filter/cetak', [ReportController::class, 'pemusnahan_obat_dinkes2_filter_cetak'])->name('pemusnahan_obat_dinkes2.filter.cetak'); 

    });
});

Route::prefix('/user-puskesmas')->name('userPuskesmas.')->middleware('auth')->group(function (){
    Route::get('/beranda', [MainController::class, 'puskesmas_beranda'])->name('beranda'); 
    Route::get('/profil', [MainController::class, 'puskesmas_profil'])->name('profil'); 
    Route::get('/notif', [MainController::class, 'puskesmas_notif'])->name('notif'); 
    Route::get('/notif/{notif_id}/{id}', [MainController::class, 'puskesmas_notif_detail'])->name('notif.detail'); 
    Route::get('/notif/delete/{id}', [MainController::class, 'puskesmas_notif_delete'])->name('notif.delete'); 
    Route::post('/profil/update/{id}', [MainController::class, 'puskesmas_profil_update'])->name('profil_update'); 
    Route::resource('pemasukan', '\App\Http\Controllers\PemasukanPuskesmasController');
    Route::put('/pemasukan/verif/{id}', [PemasukanPuskesmasController::class, 'verif'])->name('pemasukan.verif');  
    Route::resource('stok_puskesmas', '\App\Http\Controllers\StokPuskesmasController');
    Route::get('/stok_puskesmas/api/{id}', [StokPuskesmasController::class, 'api'])->name('stok_puskesmas.api'); 
    Route::resource('pengeluaran_puskesmas', '\App\Http\Controllers\PengeluaranPuskesmasController');
    Route::resource('rincian_pengeluaran', '\App\Http\Controllers\RincianPengeluaranController');
    Route::resource('pemusnahan_obat_puskesmas', '\App\Http\Controllers\PemusnahanObatController');
    Route::resource('rincian_pemusnahan', '\App\Http\Controllers\RincianPemusnahanController');
 
    Route::prefix('/report')->name('report.')->group(function (){
        Route::get('/stok_puskesmas', [ReportController::class, 'stok_puskesmas'])->name('stok_puskesmas'); 
        Route::get('/stok_puskesmas/{id}', [ReportController::class, 'stok_puskesmas_detail'])->name('stok_puskesmas_detail'); 
        Route::get('/pengeluaran_obat', [ReportController::class, 'pengeluaran_obat_puskesmas'])->name('pengeluaran_obat'); 
        Route::get('/pengeluaran_obat_detai/{id}', [ReportController::class, 'pengeluaran_obat_puskesmas_detail'])->name('pengeluaran_obat_detail'); 
        Route::get('/pemusnahan_obat_puskesmas', [ReportController::class, 'pemusnahan_obat_puskesmas'])->name('pemusnahan_obat_puskesmas'); 
        Route::get('/pemusnahan_obat_detail/{id}', [ReportController::class, 'pemusnahan_obat_detail'])->name('pemusnahan_obat_detail'); 
        Route::get('/pengeluaran_obat/filter', [ReportController::class, 'pengeluaran_obat_puskesmas_filter'])->name('pengeluaran_obat.filter'); 
        Route::get('/pengeluaran_obat/filter/cetak', [ReportController::class, 'pengeluaran_obat_puskesmas_filter_cetak'])->name('pengeluaran_obat.filter.cetak'); 
        Route::get('/pemusnahan_obat_puskesmas/filter', [ReportController::class, 'pemusnahan_obat_puskesmas_filter'])->name('pemusnahan_obat_puskesmas.filter'); 
        Route::get('/pemusnahan_obat_puskesmas/filter/cetak', [ReportController::class, 'pemusnahan_obat_puskesmas_filter_cetak'])->name('pemusnahan_obat_puskesmas.filter.cetak'); 

    });
});