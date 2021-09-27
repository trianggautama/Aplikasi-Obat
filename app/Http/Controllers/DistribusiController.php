<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostDistribusiRequest;
use App\Models\Distribusi_obat;
use App\Models\Obat;
use App\Models\Puskesmas;
use App\Models\Stok_dinkes;
use App\Models\User;
use App\Notifications\DistribusiNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class DistribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puskesmas = Puskesmas::latest()->get();
        $data      = Distribusi_obat::latest()->get();
        return view('dinkes.distribusi.index',compact('puskesmas','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function tambah(Request $req)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostDistribusiRequest $req)
    {
        $data               = $req->all();
        $data['verifikasi'] = 0;
        $distribusi         = Distribusi_obat::create($data);

        $notif                   = collect([]);
        $notif->judul            = 'Pendistribusian Obat Baru';
        $notif->status           = 'Distribusi';
        $notif->id               = $distribusi->id;
        $notif->tanggal          = $distribusi->created_at;
        $penerima                = Puskesmas::findOrFail($distribusi->puskesmas_id); 
         
        Notification::send($penerima->user, new DistribusiNotification($notif)); 

        if(Auth::user()->role == 'SuperAdmin')
        {
            return redirect()->route('userAdmin.distribusi.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->route('userDinkes.distribusi.index')->with('success','Data Berhasil Disimpan');
        }
    } 
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data       = Distribusi_obat::findOrFail($id);
        $stok       = Stok_dinkes::where('volume','!=', 0)->orderBy('obat_id')->get();
        $rincian    = $data->rincian->map(function($q){
            if(Carbon::parse($q->tgl_exp) <= Carbon::now())
            {
                $q->status_exp = 0; //kadaluarsa
            }elseif( Carbon::parse($q->tgl_exp) <= Carbon::now()->addMonths(3) && Carbon::parse($q->tgl_exp) >= Carbon::now()){
                $q->status_exp = 1 ; // mendekati kadaluarsa 3 bulan sbelum exp
            }else{
                $q->status_exp = 2; // aman
            }
            return $q;
        });
        return view('dinkes.distribusi.show',compact('data','stok','rincian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data       = Distribusi_obat::findOrFail($id);
        $puskesmas  = Puskesmas::latest()->get();
        return view('dinkes.distribusi.edit',compact('data','puskesmas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostDistribusiRequest $req, $id)
    {
        $data = Distribusi_obat::findOrFail($id);
        $data->update($req->all());

        if(Auth::user()->role == 'SuperAdmin')
        {
            return redirect()->route('userAdmin.distribusi.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->route('userDinkes.distribusi.index')->with('success','Data Berhasil Disimpan');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Distribusi_obat::findOrFail($id)->delete();

         if(Auth::user()->role == 'SuperAdmin')
        {
            return redirect()->route('userAdmin.distribusi.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->route('userDinkes.distribusi.index')->with('success','Data Berhasil Disimpan');
        }
    }
}
