<?php

namespace App\Http\Controllers;

use App\Models\Distribusi_obat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function admin_beranda()
    {

        return view('admin.index');
    }

    public function admin_dinkes()
    {

        return view('dinkes.index');
    }

    public function puskesmas_beranda()
    {

        return view('puskesmas.index');
    }

    public function puskesmas_profil()
    {

        return view('puskesmas.profil');
    }

    public function puskesmas_notif()
    {
        $notif = auth()->user()->notifications()->paginate(10);

        return view('puskesmas.notif',compact('notif'));
    } 

    public function puskesmas_notif_detail($notif_id, $id)
    {
        auth()->user()->unreadNotifications->where('id',$notif_id)->markAsRead();

        $data = Distribusi_obat::findOrFail($id);
        $rincian    = $data->rincian;

        return view('puskesmas.pemasukan.show',compact('data','rincian'));
    } 

    public function puskesmas_notif_delete($id)
    {
        auth()->user()->notifications->where('id',$id)->first()->delete();

        return redirect()->back()->with('success','Notifikasi Berhasil Dihapus');
    } 

    public function puskesmas_profil_update(Request $req, $id)
    {

        $data                  = User::findOrFail($id);
        $puskesmas             = $data->puskesmas;
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

        return redirect()->route('userPuskesmas.profil')->with('success','Data Berhasil Diubah');
    }
}
