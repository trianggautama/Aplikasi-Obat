<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostSatuanRequest;
use App\Models\Satuan_obat;
use Illuminate\Http\Request; 

class SatuanObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Satuan_obat::latest()->get();

        return view('dinkes.satuan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostSatuanRequest $req)
    {
        Satuan_obat::create($req->all());

        return redirect()->route('userDinkes.satuan.index')->with('success','Data Berhasil Disimpan');
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
        $data = Satuan_obat::findOrFail($id);

        return view('dinkes.satuan.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostSatuanRequest $req, $id)
    {
        $data = Satuan_obat::findOrFail($id);
        $data->update($req->all());

        return redirect()->route('userDinkes.satuan.index')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Satuan_obat::findOrFail($id);
        $data->delete();

        return redirect()->route('userDinkes.satuan.index')->with('success','Data Berhasil Dihapus');
    }
}
