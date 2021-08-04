<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rincian_pemusnahan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function stok_puskesmas() 
    {
        return $this->belongsto('App\Models\Stok_puskesmas');
    }

    public function pemusnahan() 
    {
        return $this->belongsto('App\Models\Pemusnahan_obat','pemusnahan_obat_id');
    }
}
