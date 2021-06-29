<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUserDinkesRequest;
use App\Http\Requests\PutUserDinkesRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDinkesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::whereRole('Dinkes')->latest()->get();
        return view('admin.dinkes.index',compact('data'));
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
    public function store(PostUserDinkesRequest $req)
    {
        $data = $req->all();
        $data['password']    = Hash::make($req['password']);
        $data['role']        = 'Dinkes';
        User::create($data);

        return redirect()->route('userAdmin.dinkes.index')->with('success','Data Berhasil Disimpan');
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
        return view('admin.dinkes.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PutUserDinkesRequest $req, $id)
    {
        $data = User::findOrFail($id);
        $data->nama            = $req->nama;
        $data->username        = $req->username;
        if($req->password)
        {
            $password          = Hash::make(request()->password);
            $data->password    = $password;
        }
        $data->update();

        return redirect()->route('userAdmin.dinkes.index')->with('success','Data Berhasil Diubah');
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
        
        return redirect()->route('userAdmin.dinkes.index')->with('success','Data Berhasil Dihapus');

    }
}
