<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class webpages extends Model
{
    protected $table = 'webpages';
    /*protected $primaryKey = 'id';
    protected $fillable = ['id', 'created_at', 'update_at','nama','icon','route','status'];*/

    public function mainmenu()
    {
        return $this->hasMany('App\mainmenu');
    }

}
