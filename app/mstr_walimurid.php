<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_walimurid extends Model
{
    public function mstr_siswa()
    {
        return $this->belongsTo('App\mstr_siswa');
    }
}
