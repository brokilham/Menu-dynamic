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
