<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemusnahanObatRequest;
use App\Models\Pemusnahan_obat;
use App\Models\Stok_dinkes;
use App\Models\Stok_puskesmas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemusnahanObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data = Pemusnahan_obat::where('puskesmas_id', Auth::user()->puskesmas->id)->latest()->get();
        return view('puskesmas.pemusnahan_obat.index',compact('data'));
    }

    public function pemusnahan_dinkes()
    { 
        
        $data = Pemusnahan_obat::where('puskesmas_id',null)->latest()->get();
        return view('dinkes.pemusnahan_obat.dinkes_index',compact('data'));
    }

    public function dinkes_index()
    { 
        // dd('tes');
        $data = Pemusnahan_obat::where('puskesmas_id','!=', 0)->latest()->get();
        return view('dinkes.pemusnahan_obat.index',compact('data'));
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
    public function store(PemusnahanObatRequest $req)
    {
        $data = $req->all();
        if(Auth::user()->role == 'Puskesmas'){
            $data['puskesmas_id'] = Auth::user()->puskesmas->id;
            Pemusnahan_obat::create($data);
            return redirect()->route('userPuskesmas.pemusnahan_obat_puskesmas.index')->with('success','Data Berhasil Disimpan');
        }else{
            $data['puskesmas_id'] = NULL;
            $data['status']       = 1;
            Pemusnahan_obat::create($data); 
            return redirect()->route('userDinkes.pemusnahan_obat_dinkes.index')->with('success','Data Berhasil Disimpan'); 
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
        $stok       = Stok_puskesmas::whereDate('tgl_exp','<=', Carbon::now())->get();
        $data       = Pemusnahan_obat::findOrFail($id);
        $rincian    = $data->rincian;
        return view('puskesmas.pemusnahan_obat.show',compact('data','stok','rincian'));
    }

    public function dinkes_show($id)
    {

        $data       = Pemusnahan_obat::findOrFail($id);
        $rincian    = $data->rincian;
        return view('dinkes.pemusnahan_obat.dinkes_show',compact('data','rincian'));
    }


    public function pemusnahan_dinkes_show($id)
    {
        $stok       = Stok_dinkes::whereDate('tgl_exp','<=', Carbon::now())->get();
        $data       = Pemusnahan_obat::findOrFail($id);
        $rincian    = $data->rincian;
        return view('dinkes.pemusnahan_obat.dinkes_show',compact('data','rincian','stok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pemusnahan_obat::findOrFail($id);
        return view('puskesmas.pemusnahan_obat.edit',compact('data'));
    }

    public function dinkes_edit($id)
    {
        $data = Pemusnahan_obat::findOrFail($id);
        return view('dinkes.pemusnahan_obat.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PemusnahanObatRequest $req, $id)
    {
        $data = Pemusnahan_obat::findOrFail($id);
        $data->update($req->all());

        return redirect()->route('userPuskesmas.pemusnahan_obat_puskesmas.index')->with('success','Data Berhasil Diupdate');
    }

    public function dinkes_update(PemusnahanObatRequest $req, $id)
    {
        $data = Pemusnahan_obat::findOrFail($id);
        $data->update($req->all());

        return redirect()->route('userDinkes.pemusnahan_obat_dinkes.index')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemusnahan_obat::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }

    public function verifikasi($id)
    {
        $data = Pemusnahan_obat::findOrfail($id);
        $data->status = 1;
        $data->update();

        return redirect()->back()->with('success','Data Berhasil Diverifikasi');
    }
}
