<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_ket_realisasi extends Model
{
    public function t_bimbingan()
    {
        // foreign, primary
        return $this->hasOne('App\t_bimbingan','id_realisasi','status_realisasi');   
    }


}
