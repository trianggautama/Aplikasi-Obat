<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rincian_distribusi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function stok_dinkes() 
    {
        return $this->belongsto('App\Models\Stok_dinkes');
    }

    public function distribusi() 
    {
        return $this->belongsto('App\Models\Distribusi_obat');
    }
}
