<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_guru extends Model
{
    public function t_bimbingan()
    {
        return $this->hasOne('App\t_bimbingan','id_guru');   
    }

    public function t_distribusi_jabatan()
    {
        return $this->hasOne('App\t_distribusi_jabatan','id_guru');
         // kita definisikan foreign keynya id_siswa 
    }

    public function t_distribusi_walikelas()
    {
        return $this->hasOne('App\t_distribusi_walikelas','id_guru');
         // kita definisikan foreign keynya id_siswa 
    }


    // begin convert datetime to date
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->format('d-m-Y');
    }

    public function getUpdatedAtAttribute()
    {
    
       return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->format('d-m-Y');
    }

    // end convert datetime to date
}
