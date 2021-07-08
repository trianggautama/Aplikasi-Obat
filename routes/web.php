<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    MainController,AuthController,UserPuskesmasController,DistribusiController,PemasukanPuskesmasController
};

Route::get('/', [AuthController::class, 'login'])->name('login'); 
Route::post('/', [AuthController::class, 'login_store'])->name('loginStore'); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 



Route::prefix('/user-admin')->name('userAdmin.')->middleware('auth')->group(function (){
    Route::get('/beranda', [MainController::class, 'admin_beranda'])->name('beranda'); 
    Route::resource('dinkes', '\App\Http\Controllers\UserDinkesController');
    Route::resource('puskesmas', '\App\Http\Controllers\UserPuskesmasController');  
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
    // Route::resource('suplier', '\App\Http\Controllers\SuplierController');
    Route::resource('obat', '\App\Http\Controllers\ObatController');
    Route::resource('stok_dinkes', '\App\Http\Controllers\StokDinkesController');
    Route::resource('distribusi', '\App\Http\Controllers\DistribusiController');
    Route::post('distribusi/obat/', [DistribusiController::class, 'tambah'])->name('distribusi.tambah');     
    Route::resource('rincian_distribusi', '\App\Http\Controllers\RincianDistribusiController');

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
});