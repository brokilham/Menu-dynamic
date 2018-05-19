<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_jabatan extends Model
{
    public function t_distribusi_jabatan()
    {
        return $this->hasOne('App\t_distribusi_jabatan','id_jabatan');
         // kita definisikan foreign keynya id_siswa 
    }
}
