<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstr_privilages extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\users');
    }
}
