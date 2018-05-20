<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_distribusi_walikelas extends Model
{
    public function mstr_guru()
    {
        return $this->belongsTo('App\mstr_guru','id_guru');   
    }

    public function mstr_kelas()
    {
        return $this->belongsTo('App\mstr_kelas','id_kelas');   
    }
}
