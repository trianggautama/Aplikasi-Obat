<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rincian_pengeluaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function stok_puskesmas() 
    {
        return $this->belongsto('App\Models\Stok_puskesmas');
    }

    public function pengeluaran() 
    {
        return $this->belongsto('App\Models\Pengeluaran_puskesmas','pengeluaran_puskesmas_id');
    }
}
