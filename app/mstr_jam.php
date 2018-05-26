<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_jam extends Model
{
    public function mstr_jadwal()
    {
        return $this->belongsTo('App\mstr_jadwal','jam');   
    }

}
