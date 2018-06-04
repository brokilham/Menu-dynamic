<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use auth;
class t_distribusi_jabatan extends Model
{
    protected $appends = ['login_as'];

    public function getLoginAsAttribute() // sepertinya ini harus sama denga field append yang di deklarasikan 
    {
        return  Auth::user()->login_as;
    }

    public function mstr_guru()
    {
        return $this->belongsTo('App\mstr_guru','id_guru');   
    }

    public function mstr_jabatan()
    {
        return $this->belongsTo('App\mstr_jabatan','id_jabatan');   
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
