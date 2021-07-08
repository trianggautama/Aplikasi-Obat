<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
 
    public function kategori() 
    {
        return $this->belongsto('App\Models\Kategori_obat','kategori_obat_id');
    }

    public function satuan() 
    {
        return $this->belongsto('App\Models\Satuan_obat','satuan_obat_id');
    }

    public function stok_dinkes() 
    {
        return $this->hasMany('App\Models\Stok_dinkes');
    }

    public function stok_puskesmas() 
    {
        return $this->hasMany('App\Models\Stok_puskesmas');
    }

}
