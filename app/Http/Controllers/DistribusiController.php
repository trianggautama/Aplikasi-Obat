<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostDistribusiRequest;
use App\Models\Distribusi_obat;
use App\Models\Obat;
use App\Models\Puskesmas;
use App\Models\Stok_dinkes;
use App\Models\User;
use App\Notifications\DistribusiNotification;
use Illuminate\Http\Request;
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
        $notif->id               = $distribusi->id;
        $notif->tanggal          = $distribusi->created_at;
        $penerima                = Puskesmas::findOrFail($distribusi->puskesmas_id); 
         
        Notification::send($penerima->user, new DistribusiNotification($notif)); 

        return redirect()->route('userDinkes.distribusi.index')->with('success','Data Berhasil Disimpan');

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
        $stok       = Stok_dinkes::orderBy('obat_id')->get();
        $rincian    = $data->rincian;
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

        return redirect()->route('userDinkes.distribusi.index')->with('success','Data Berhasil Disimpan');
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

        return redirect()->route('userDinkes.distribusi.index')->with('success','Data Berhasil Dihapus');

    }
}
