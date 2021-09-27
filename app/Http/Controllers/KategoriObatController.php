<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostKategoriRequest;
use App\Models\Kategori_obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori_obat::latest()->get();

        return view('dinkes.kategori.index',compact('data'));
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
    public function store(PostKategoriRequest $req)
    {
        Kategori_obat::create($req->all());

        if(Auth::user()->role == 'SuperAdmin')
        {
            return redirect()->route('userAdmin.kategori.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->route('userDinkes.kategori.index')->with('success','Data Berhasil Disimpan');
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
        $data = Kategori_obat::findOrFail($id);

        return view('dinkes.kategori.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostKategoriRequest $req, $id)
    {
        $data = Kategori_obat::findOrFail($id);
        $data->update($req->all());

        if(Auth::user()->role == 'SuperAdmin')
        {
            return redirect()->route('userAdmin.kategori.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->route('userDinkes.kategori.index')->with('success','Data Berhasil Disimpan');
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
        $data = Kategori_obat::findOrFail($id);
        $data->delete();

        if(Auth::user()->role == 'SuperAdmin')
        {
            return redirect()->route('userAdmin.kategori.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->route('userDinkes.kategori.index')->with('success','Data Berhasil Disimpan');
        }    
    }
}
