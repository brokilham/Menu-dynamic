<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class privilage_webpages extends Model
{   
    protected $table = 'privilage_webpages';  
    
    public function User()
    {
        return $this->belongsTo('App\User','email');   
    }

    public function users()
    {
        return $this->belongsTo('App\User','email');   
    }
}
