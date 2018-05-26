<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_jadwal extends Model
{
    public function mstr_jam()
    {
        return $this->hasOne('App\mstr_jam','id');
    }

    public function t_distribusi_jadwal()
    {
        return $this->belongsTo('App\t_distribusi_jadwal','id_jadwal');   
    }
}
