<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gender;
use App\Models\Location;
use App\Models\Address;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GatereadyUser extends Model 
{
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password','avatar', 'facebook_id','first_time','transaction_quantity',
        'invite_code', 'credit','profile_picture','location_id','contact_number','gender_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * *******    this user belong to a gender  ****
     */
    public function gender(){
        return $this->belongsTo('App\Models\Gender');
    }

    /**
     * *******    this user belong to a location  ****
     */
    public function location(){
        return $this->belongsTo('App\Models\Location');
    }

    /**
     * *******   get records for a user  ****
     */
    public function records(){
        return $this->hasMany('App\Models\Record');
    }

    /**
     * *******   get address for a user  ****
     */
    public function address(){
        return $this->hasOne('App\Models\Address');
    }
}
