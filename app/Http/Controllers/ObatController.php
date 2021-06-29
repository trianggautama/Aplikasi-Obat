<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostObatRequest;
use App\Models\Kategori_obat;
use App\Models\Obat;
use App\Models\Satuan_obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function __construct()
    {
        $this->kategori = Kategori_obat::orderBy('kategori')->get();
        $this->satuan   = Satuan_obat::orderBy('satuan')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data       = Obat::orderBy('nama_obat')->get();
        $kategori   = $this->kategori;
        $satuan     = $this->satuan;

        return view('dinkes.obat.index',compact('data','kategori','satuan'));
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
    public function store(PostObatRequest $req)
    {
        Obat::create($req->all());
        return redirect()->route('userDinkes.obat.index')->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Obat::findOrFail($id);
        $stok = $data->stok_dinkes;
        return view('dinkes.obat.show',compact('data','stok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Obat::findOrFail($id);
        $kategori   = $this->kategori;
        $satuan     = $this->satuan;

        return view('dinkes.obat.edit',compact('data','kategori','satuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostObatRequest $req, $id)
    {
        $data = Obat::findOrFail($id);
        $data->update($req->all());

        return redirect()->route('userDinkes.obat.index')->with('success','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Obat::findOrFail($id);
        $data->delete();

        return redirect()->route('userDinkes.obat.index')->with('success','Data Berhasil Dihapus');
    }
}
 