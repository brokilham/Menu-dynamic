<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_jadwal extends Model
{
    public function mstr_jam()
    {
        return $this->hasOne('App\mstr_jam','id');
    }

    public function t_distribusi_jadwal()
    {
        return $this->hasOne('App\t_distribusi_jadwal','id_jadwal');
    }

    /*public function t_distribusi_jadwal()
    {
        return $this->belongsTo('App\t_distribusi_jadwal','id_jadwal');   
    }*/

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
