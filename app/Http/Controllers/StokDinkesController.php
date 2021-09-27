<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStokDinkesRequest;
use App\Models\Obat;
use App\Models\Stok_dinkes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StokDinkesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Stok_dinkes::get()->map(function($q){
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

        $obat = Obat::orderBy('nama_obat')->get();

        return view('dinkes.stok_obat.index',compact('data','obat'));
    }

    /**x    
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStokDinkesRequest $req)
    {
        $data               = $req->all();
        $obat               = Obat::findOrFail($req->obat_id);
        $idmax              = Stok_dinkes::max('id');
        if($idmax == null){
            $idmax = 1 ;
        }
        $data['kode_stok']  = $obat->kode_obat.'.'.$idmax;
        Stok_dinkes::create($data);

        if(Auth::user()->role == 'SuperAdmin')
        {
            return redirect()->route('userAdmin.stok_dinkes.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->route('userDinkes.stok_dinkes.index')->with('success','Data Berhasil Disimpan');
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
        $data           = Stok_dinkes::findOrFail($id);
        $data->satuan   = $data->obat->satuan->satuan;
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Stok_dinkes::findOrFail($id);
        $obat = Obat::orderBy('nama_obat')->get();

        return view('dinkes.stok_obat.edit',compact('data','obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = Stok_dinkes::findOrFail($id);
        $data->update($req->all());

        if(Auth::user()->role == 'SuperAdmin')
        {
            return redirect()->route('userAdmin.stok_dinkes.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->route('userDinkes.stok_dinkes.index')->with('success','Data Berhasil Disimpan');
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
        $data = Stok_dinkes::findOrFail($id);
        $data->delete();

        if(Auth::user()->role == 'SuperAdmin')
        {
            return redirect()->route('userAdmin.stok_dinkes.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->route('userDinkes.stok_dinkes.index')->with('success','Data Berhasil Disimpan');
        }

    }
}
