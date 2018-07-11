<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_bimbingan extends Model
{
    public function mstr_ket_realisasi()
    {
        //primary, foreign
        return $this->belongsTo('App\mstr_ket_realisasi','status_realisasi','id_realisasi');   
    }

    public function mstr_siswa()
    {
        return $this->belongsTo('App\mstr_siswa','id_siswa');   
    }

    public function mstr_guru()
    {
        return $this->belongsTo('App\mstr_guru','id_guru');   
    }

    // begin convert datetime to date
    public function getTglPengajuanAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tgl_pengajuan'])
        ->format('d-m-Y');
    }

    public function getTglRealisasiAttribute()
    {
    
       return \Carbon\Carbon::parse($this->attributes['tgl_realisasi'])
       ->format('d-m-Y');
    }
    // end convert datetime to date

}
