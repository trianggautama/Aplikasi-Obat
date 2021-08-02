<?php

namespace App\Http\Controllers;

use App\Http\Requests\RincianPengeluaranRequest;
use App\Models\Rincian_pengeluaran;
use App\Models\Stok_puskesmas;
use Illuminate\Http\Request;

class RincianPengeluaranController extends Controller
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
    public function store(RincianPengeluaranRequest $req)
    {
        Rincian_pengeluaran::create($req->all());

        $stok = Stok_puskesmas::findOrFail($req->stok_puskesmas_id);
        $stok->volume = $stok->volume - $req->volume;
        $stok->update();

        return redirect()->route('userPuskesmas.pengeluaran_puskesmas.show',$req->pengeluaran_puskesmas_id)->with('success','Data Berhasil Disimpan');

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
        $data = Rincian_pengeluaran::findOrFail($id);
        $stok_puskesmas = Stok_puskesmas::findOrFail($data->stok_puskesmas_id);
        $stok_puskesmas->volume = $stok_puskesmas->volume + $data->volume;
        $stok_puskesmas->update();
        $data->delete();

        return redirect()->route('userPuskesmas.pengeluaran_puskesmas.show',$data->pengeluaran_puskesmas_id)->with('success','Data Berhasil Disimpan');

    }
}
