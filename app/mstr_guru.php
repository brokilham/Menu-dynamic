<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_guru extends Model
{
    public function t_distribusi_jabatan()
    {
        return $this->hasOne('App\t_distribusi_jabatan','id_guru');
         // kita definisikan foreign keynya id_siswa 
    }
}
