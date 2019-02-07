<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    //  this courier has many record
    public function records()
    {
    	$this->hasMany('App\Models\Record');
    }
}
