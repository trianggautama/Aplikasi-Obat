<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRincianDistribusiRequest;
use App\Models\Rincian_distribusi;
use App\Models\Stok_dinkes;
use Illuminate\Http\Request;

class RincianDistribusiController extends Controller
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
    public function store(PostRincianDistribusiRequest $req)
    {
       $stok            = Stok_dinkes::findOrFail($req->stok_dinkes_id);
       $rincian         = Rincian_distribusi::create($req->all());
       $stok->volume    = $stok->volume - $rincian->volume;
       $stok->update();

       return redirect()->back()->with('success','Data Berhasil Disimpan');
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
        $data = Rincian_distribusi::findOrFail($id);
        
        return view('dinkes.rincian_distribusi.edit',compact('data'));
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
        $rincian = Rincian_distribusi::findOrFail($id);
        $stok    = $rincian->stok_dinkes;
        $stok->volume = $stok->volume + $rincian->volume;
        $stok->update();
        $rincian->delete();
        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
