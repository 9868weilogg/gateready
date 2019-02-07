<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'address_line_1', 'address_line_2', 'location_id',
    ];


    //  this address belongs to a user
    public function user()
    {
    	$this->belongsTo('App\User');
    }
}
