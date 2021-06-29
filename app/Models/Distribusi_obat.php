<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi_obat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rincian() 
    {
        return $this->hasMany('App\Models\Rincian_distribusi');
    }

    public function puskesmas() 
    {
        return $this->belongsTo('App\Models\Puskesmas');
    }

} 
 