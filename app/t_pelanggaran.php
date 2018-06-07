<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_pelanggaran extends Model
{
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

    public function getTanggalKejadianAttribute()
    {
    
       return \Carbon\Carbon::parse($this->attributes['tanggal_kejadian'])
       ->format('d-m-Y');
    }

    // end convert datetime to date
}
