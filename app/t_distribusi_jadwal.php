<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use auth;
class t_distribusi_jadwal extends Model
{

    protected $appends = ['login_as'];

    public function getLoginAsAttribute() // sepertinya ini harus sama denga field append yang di deklarasikan 
    {
        return  Auth::user()->login_as;
    }

    public function mstr_jadwal()
    {
        return $this->belongsTo('App\mstr_jadwal','id');   
    }
    
    /*public function mstr_jadwal()
    {
        return $this->hasOne('App\mstr_jadwal','id');
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
