<?php

namespace App\Http\Controllers;

use App\Models\Distribusi_obat;
use App\Models\Obat;
use App\Models\Pemusnahan_obat;
use App\Models\Pengeluaran_puskesmas;
use App\Models\Stok_dinkes;
use App\Models\Stok_puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

use function Ramsey\Uuid\v1;

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

    public function pemusnahan_obat_dinkes()
    {
        $data = Pemusnahan_obat::where('puskesmas_id','!=', 0)->latest()->get();
        $pdf  = PDF::loadView('report.pemusnahan_obat_dinkes', ['data'=>$data]);
        $pdf->setPaper('a4', 'potrait'); 
        
        return $pdf->stream('Pemusnahan Obat dinkes.pdf');
    } 

    public function pemusnahan_obat_dinkes2()
    {
        $data       = Pemusnahan_obat::where('puskesmas_id', null)->latest()->get();
        $pdf  = PDF::loadView('report.pemusnahan_obat_dinkes2', ['data'=>$data]);
        $pdf->setPaper('a4', 'potrait'); 
        
        return $pdf->stream('Pemusnahan Obat dinkes.pdf');
    } 

    public function pemusnahan_obat_puskesmas()
    {
        $data       = Pemusnahan_obat::where('puskesmas_id',Auth::user()->puskesmas->id)->latest()->get();
        $pdf  = PDF::loadView('report.pemusnahan_obat_puskesmas', ['data'=>$data]);
        $pdf->setPaper('a4', 'potrait'); 
        
        return $pdf->stream('Pemusnahan Obat Puskesmas.pdf');
    } 

    public function pemusnahan_obat_detail($id)
    {
        $data       = Pemusnahan_obat::findOrFail($id);
        if($data->puskesmas_id == null){
            $rincian    = $data->rincian;
            $pdf  = PDF::loadView('report.berita_pemusnahan_obat_dinkes', ['data'=>$data, 'rincian'=>$rincian]);
            $pdf->setPaper('a4', 'potrait'); 
        }else{
            $rincian    = $data->rincian;
            $pdf  = PDF::loadView('report.berita_pemusnahan_obat', ['data'=>$data, 'rincian'=>$rincian]);
            $pdf->setPaper('a4', 'potrait'); 
        }
       
        
        return $pdf->stream('Berita Acara Pemusnahan Obat.pdf');
    } 

    public function distribusi_filter()
    {
        return view('dinkes.distribusi.filter');
    }

    public function distribusi_filter_cetak( Request $req)
    {
        $data         = Distribusi_obat::whereBetween('tgl_distribusi', [$req->tgl_awal, $req->tgl_akhir])->get();
        $tgl_awal     = $req->tgl_awal;
        $tgl_akhir    = $req->tgl_akhir ;

        $pdf          = PDF::loadView('report.distribusi_filter', ['data'=>$data,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir,]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Pemasukan Filter.pdf');
        return view('dinkes.distribusi.filter');
    }

    public function stok_obat_dinkes_filter()
    {

        return view('dinkes.stok_obat.filter');
    }

    public function stok_obat_dinkes_filter_cetak( Request $req)
    {
        $data         = Stok_dinkes::whereBetween('tgl_masuk', [$req->tgl_awal, $req->tgl_akhir])->get();
        $tgl_awal     = $req->tgl_awal;
        $tgl_akhir    = $req->tgl_akhir ;

        $pdf          = PDF::loadView('report.stok_obat_dinkes_filter', ['data'=>$data,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir,]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Stok Obat Dinkes Filter.pdf');
    }

    public function pemusnahan_obat_dinkes2_filter()
    {

        return view('dinkes.pemusnahan_obat.dinkes_filter');
    }

    public function pemusnahan_obat_dinkes2_filter_cetak( Request $req)
    {
        $data         = Pemusnahan_obat::where('puskesmas_id', null)->whereBetween('tanggal_pemusnahan', [$req->tgl_awal, $req->tgl_akhir])->get();
        $tgl_awal     = $req->tgl_awal;
        $tgl_akhir    = $req->tgl_akhir ;

        $pdf          = PDF::loadView('report.pemusnahan_obat_dinkes2_filter', ['data'=>$data,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir,]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Pemusnahan Obat Dinkes Filter.pdf');
    }

    public function pengeluaran_obat_puskesmas_filter()
    {

        return view('puskesmas.pengeluaran_obat.filter');
    }

    public function pengeluaran_obat_puskesmas_filter_cetak( Request $req)
    {
        $data         = Pengeluaran_puskesmas::where('puskesmas_id', Auth::user()->puskesmas->id)->whereBetween('created_at', [$req->tgl_awal, $req->tgl_akhir])->get();
        $tgl_awal     = $req->tgl_awal;
        $tgl_akhir    = $req->tgl_akhir ;
        $pdf          = PDF::loadView('report.pengeluaran_obat_puskesmas_filter', ['data'=>$data,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir,]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Pengeluaran Obat Filter.pdf');
    }

    public function pemusnahan_obat_puskesmas_filter()
    {

        return view('puskesmas.pemusnahan_obat.filter');
    }

    public function pemusnahan_obat_puskesmas_filter_cetak( Request $req)
    {
        $data         = Pemusnahan_obat::where('puskesmas_id', Auth::user()->puskesmas->id)->whereBetween('tanggal_pemusnahan', [$req->tgl_awal, $req->tgl_akhir])->get();
        $tgl_awal     = $req->tgl_awal;
        $tgl_akhir    = $req->tgl_akhir ;
        $pdf          = PDF::loadView('report.pemusnahan_obat_puskesmas', ['data'=>$data,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir,]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Pengeluaran Obat Filter.pdf');
    }
}
 