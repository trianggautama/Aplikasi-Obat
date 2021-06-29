<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUserPuskesmasRequest;
use App\Http\Requests\PutUserPuskesmasRequest;
use App\Models\Puskesmas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserPuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::whereRole('Puskesmas')->latest()->get();
        return view('admin.puskesmas.index',compact('data'));
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
    public function store(PostUserPuskesmasRequest $req)
    {
        $data                = $req->all();
        $data['password']    = Hash::make($req['password']);
        $data['role']        = 'Puskesmas';
        $user                = User::create($data);
        $data['user_id']     = $user->id;
        Puskesmas::create($data);

        return redirect()->route('userAdmin.puskesmas.index')->with('success','Data Berhasil Disimpan'); 
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
        $data = User::findOrFail($id);
        return view('admin.puskesmas.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PutUserPuskesmasRequest $req, $id)
    {
        $data                  = User::findOrFail($id);
        $puskesmas             = $data->puskesmas;
        $data->nama            = $req->nama;
        $data->username        = $req->username;
        $puskesmas->alamat     = $req->alamat;
        $puskesmas->no_hp      = $req->no_hp;
        
        if($req->password)
        {
            $password          = Hash::make(request()->password);
            $data->password    = $password;
        }
        $puskesmas->save();
        $data->update();


        return redirect()->route('userAdmin.puskesmas.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        
        return redirect()->route('userAdmin.puskesmas.index')->with('success','Data Berhasil Dihapus');
    }

    public function dinkes_index()
    {
        $data = User::whereRole('Puskesmas')->latest()->get();
        return view('dinkes.puskesmas.index',compact('data'));
    }

    public function dinkes_show($id)
    {
        $data = User::findOrFail($id);
        return view('dinkes.puskesmas.show',compact('data'));
    }
}
