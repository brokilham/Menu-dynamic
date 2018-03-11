<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    /*protected $primaryKey = 'id';
    protected $fillable = ['id', 'created_at', 'update_at','nama','icon','route','status'];*/

    public function privilage_webpages()
    {
        return $this->hasMany('App\privilage_webpages');
    }

}
