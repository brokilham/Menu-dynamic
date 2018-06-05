<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_distribusi_kelas extends Model
{
    public function mstr_siswa()
    {
        return $this->belongsTo('App\mstr_siswa','id_siswa');   
    }

    public function mstr_kelas()
    {
        return $this->belongsTo('App\mstr_kelas','id_kelas');   
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
