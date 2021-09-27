<?php

namespace App\Http\Controllers;

use App\Models\Distribusi_obat;
use App\Models\Puskesmas;
use Illuminate\Http\Request;

class AdminPemasukanObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $puskesmas = Puskesmas::latest()->get();
        return view('admin.pemasukan_obat.index',compact('puskesmas'));
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
    public function data($id)
    {
        $puskesmas = Puskesmas::findOrFail($id);
        $data = Distribusi_obat::where('puskesmas_id',$puskesmas->id)->latest()->get();
        return view('admin.pemasukan_obat.data',compact('puskesmas','data'));
    }

    public function show($id)
    {
        $data       = Distribusi_obat::whereId($id)->first();
        $rincian    = $data->rincian;
        return view('admin.pemasukan_obat.show',compact('data','rincian'));
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
