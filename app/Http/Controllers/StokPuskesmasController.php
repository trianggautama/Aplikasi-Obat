<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Stok_puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StokPuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data       = Obat::orderBy('nama_obat')->get();

        return view('puskesmas.stok_obat.index',compact('data'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data    = Obat::findOrFail($id);
        $rincian = Stok_puskesmas::where('obat_id',$data->id)->where('puskesmas_id',Auth::user()->puskesmas->id)->latest()->get();
        return view('puskesmas.stok_obat.show',compact('data','rincian'));
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
        //
    }

    public function api($id)
    {
        $data = Stok_puskesmas::findOrFail($id);

        return json_encode($data);
    }
}
