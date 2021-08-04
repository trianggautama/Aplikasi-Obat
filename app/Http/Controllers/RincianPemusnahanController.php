<?php

namespace App\Http\Controllers;

use App\Models\Pemusnahan_obat;
use App\Models\Rincian_pemusnahan;
use App\Models\Stok_puskesmas;
use Illuminate\Http\Request;

class RincianPemusnahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Rincian_pemusnahan::create($req->all());

        $stok = Stok_puskesmas::findOrFail($req->stok_puskesmas_id);
        $stok->volume = $stok->volume - $req->volume;
        $stok->update();

        return redirect()->route('userPuskesmas.pemusnahan_obat_puskesmas.show',$req->pemusnahan_obat_id)->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = Rincian_pemusnahan::findOrFail($id);
        $stok_puskesmas = Stok_puskesmas::findOrFail($data->stok_puskesmas_id);
        $stok_puskesmas->volume = $stok_puskesmas->volume + $data->volume;
        $stok_puskesmas->update();
        $data->delete();

        return redirect()->route('userPuskesmas.pemusnahan_obat_puskesmas.show',$data->pemusnahan_obat_id)->with('success','Data Berhasil Disimpan');
    }

}
