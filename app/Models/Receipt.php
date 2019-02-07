<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_number', 'file_name', 'original_file_name', 'mime',
    ];

    /**
     * ***  get the record for this specific receipt
     */
    public function record(){
    	return $this->hasOne('App\Models\Record');
    }
}
