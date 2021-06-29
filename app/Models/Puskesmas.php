<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() 
    {
        return $this->belongsto('App\Models\User');
    }
}
