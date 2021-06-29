<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok_dinkes extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function obat() 
    {
        return $this->belongsto('App\Models\Obat','obat_id');
    }

}
