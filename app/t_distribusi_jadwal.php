<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_distribusi_jadwal extends Model
{
    public function mstr_jadwal()
    {
        return $this->hasOne('App\mstr_jadwal','id');
    }
}
