<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_siswa extends Model
{
    public function mstr_walimurid()
    {
        return $this->hasMany('App\mstr_walimurid');
    }
}
