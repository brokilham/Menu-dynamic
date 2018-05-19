<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_siswa extends Model
{
    public function mstr_walimurid()
    {
        return $this->hasMany('App\mstr_walimurid');
    }

    public function t_distribusi_kelas()
    {
        return $this->hasOne('App\t_distribusi_kelas','id_siswa');
         // kita definisikan foreign keynya id_siswa 
    }

}
