<?php

namespace App\Http\Controllers;

use App\Models\Distribusi_obat;
use App\Models\Obat;
use App\Models\Pengeluaran_puskesmas;
use App\Models\Stok_dinkes;
use App\Models\Stok_puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReportController extends Controller
{
    public function obat()
    {
        $data = Obat::latest()->get();
        $pdf =PDF::loadView('report.obat', ['data'=>$data]);
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream('Laporan Obat.pdf');
    }

    public function detail_obat($id)
    {
        $data = Obat::findOrFail($id);
        $stok = $data->stok_dinkes;

        $pdf  = PDF::loadView('report.obat_detail', ['data'=>$data,'stok'=>$stok]);
        $pdf->setPaper('a4', 'potrait'); 
        
        return $pdf->stream('Laporan Obat.pdf');
    }

    public function stok_obat_dinkes()
    {
        $data = Stok_dinkes::latest()->get();

        $pdf  = PDF::loadView('report.stok_obat_dinkes', ['data'=>$data]);
        $pdf->setPaper('a4', 'potrait'); 
        
        return $pdf->stream('Laporan Stok Obat Dinkes.pdf');
    }

    public function distribusi()
    {
        $data = Distribusi_obat::latest()->get();

        $pdf  = PDF::loadView('report.distribusi', ['data'=>$data]);
        $pdf->setPaper('a4', 'potrait'); 
        
        return $pdf->stream('Laporan Distribusi Dinkes.pdf');
    }

    public function distribusi_detail($id)
    {
        $data       = Distribusi_obat::findOrFail($id);
        $rincian    = $data->rincian;

        $pdf  = PDF::loadView('report.distribusi_detail', ['data'=>$data, 'rincian'=>$rincian]);
        $pdf->setPaper('a4', 'potrait'); 
        
        return $pdf->stream('Laporan Distribusi Dinkes.pdf');
    }

    public function stok_puskesmas()
    {
        $data       = Obat::orderBy('nama_obat')->get();

        $pdf  = PDF::loadView('report.stok_obat_puskesmas', ['data'=>$data]);
        $pdf->setPaper('a4', 'potrait'); 
        
        return $pdf->stream('Laporan Stok Obat Puskesmas.pdf');
    } 

    public function stok_puskesmas_detail($id)
    {
        $data    = Obat::findOrFail($id);
        $rincian = Stok_puskesmas::where('obat_id',$data->id)->where('puskesmas_id',Auth::user()->puskesmas->id)->latest()->get();
        
        $pdf  = PDF::loadView('report.stok_obat_puskesmas_detail', ['data'=>$data,'rincian'=>$rincian]);
        $pdf->setPaper('a4', 'potrait'); 
         
        return $pdf->stream('Laporan Stok Obat Puskesmas detail.pdf');
    } 

    public function pengeluaran_obat_puskesmas()
    {
        $data       = Pengeluaran_puskesmas::where('puskesmas_id',Auth::user()->puskesmas->id)->latest()->get();

        $pdf  = PDF::loadView('report.pengeluaran_obat_puskesmas', ['data'=>$data]);
        $pdf->setPaper('a4', 'potrait'); 
        
        return $pdf->stream('Laporan  Pengeluaran Obat Puskesmas.pdf');
    } 

    public function pengeluaran_obat_puskesmas_detail($id)
    {
        $data       = Pengeluaran_puskesmas::findOrFail($id);
        $rincian    = $data->rincian;

        $pdf  = PDF::loadView('report.pengeluaran_obat_puskesmas_detail', ['data'=>$data, 'rincian'=>$rincian]);
        $pdf->setPaper('a4', 'potrait'); 
        
        return $pdf->stream('Laporan Pengeluaran Puskesmas Detail.pdf');
    } 

}
 