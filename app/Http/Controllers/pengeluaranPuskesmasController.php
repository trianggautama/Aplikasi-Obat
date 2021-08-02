<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengeluaranPuskesmasRequest;
use App\Models\Pengeluaran_puskesmas;
use App\Models\Stok_dinkes;
use App\Models\Stok_puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pengeluaranPuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengeluaran_puskesmas::latest()->get();
        return view('puskesmas.pengeluaran_obat.index',compact('data'));
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
    public function store(PengeluaranPuskesmasRequest $req)
    {
        $data = $req->all();
        $data['puskesmas_id'] = Auth::user()->puskesmas->id;
        Pengeluaran_puskesmas::create($data);

        return redirect()->route('userPuskesmas.pengeluaran_puskesmas.index')->with('success','Data Berhasil Disimpan');
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
        return view('puskesmas.pengeluaran_obat.show',compact('data','stok','rincian'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengeluaran_puskesmas::findOrFail($id);
        return view('puskesmas.pengeluaran_obat.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PengeluaranPuskesmasRequest $req, $id)
    {
        $data = Pengeluaran_puskesmas::findOrFail($id);
        $data->update($req->all());

        return redirect()->route('userPuskesmas.pengeluaran_puskesmas.index')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pengeluaran_puskesmas::findOrFail($id);
        $data->delete();

        return redirect()->route('userPuskesmas.pengeluaran_puskesmas.index')->with('success','Data Berhasil Dihapus');
    }
}
