<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran_puskesmas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rincian() 
    {
        return $this->hasMany('App\Models\Rincian_pengeluaran');
    }

    public function puskesmas() 
    {
        return $this->belongsTo('App\Models\Puskesmas');
    }
}
