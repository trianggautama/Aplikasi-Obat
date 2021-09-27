<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran_puskesmas;
use App\Models\Puskesmas;
use App\Models\Stok_puskesmas;
use Illuminate\Http\Request;

class AdminPengeluaranObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puskesmas = Puskesmas::latest()->get();
        return view('admin.pengeluaran_obat.index',compact('puskesmas'));
    }

    public function data($id)
    {
        $puskesmas  = Puskesmas::findOrFail($id);
        $data       = Pengeluaran_puskesmas::where('puskesmas_id',$puskesmas->id)->latest()->get();

        return view('admin.pengeluaran_obat.data',compact('puskesmas','data'));
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
        $stok       = Stok_puskesmas::latest()->get();
        $data       = Pengeluaran_puskesmas::findOrFail($id);
        $rincian    = $data->rincian;
        return view('admin.pengeluaran_obat.show',compact('data','stok','rincian'));
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
}
