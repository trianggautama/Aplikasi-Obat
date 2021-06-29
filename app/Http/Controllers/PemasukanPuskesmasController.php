<?php

namespace App\Http\Controllers;

use App\Models\Distribusi_obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemasukanPuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Distribusi_obat::where('puskesmas_id',Auth::user()->puskesmas->id)->latest()->get();
        return view('puskesmas.pemasukan.index',compact('data'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data                    = Distribusi_obat::where('kode_distribusi',$req->kode_distribusi)->first();
        $data->status_distribusi = 2;
        $data->tgl_diterima      = $req->tgl_diterima;
        $data->update($req->all());

        return redirect()->route('userPuskesmas.pemasukan.index')->with('success','Data Berhasil Diverifikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Distribusi_obat::whereId($id)->first();
        $rincian    = $data->rincian;
        return view('puskesmas.pemasukan.show',compact('data','rincian'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
