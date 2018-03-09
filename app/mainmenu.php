<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mainmenu extends Model
{
    protected $table = 'mainmenu';

    public function webpages()
    {
        return $this->belongsTo('App\webpages');
    }
    
}
