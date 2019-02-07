<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function records(){
    	return $this->hasMany('App\Models\Record');
    }
}
