<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_distribusi_jabatan extends Model
{
    public function mstr_guru()
    {
        return $this->belongsTo('App\mstr_guru','id_guru');   
    }

    public function mstr_jabatan()
    {
        return $this->belongsTo('App\mstr_jabatan','id_jabatan');   
    }
}
