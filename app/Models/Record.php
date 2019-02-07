<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Status;
use App\Models\Courier;
use App\Models\TimeRange;
use App\Models\Package;
use App\Models\Receipt;

class Record extends Model
{
    protected $primaryKey = 'reference_number';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_number', 'gateready_user_id', 'tracking_number', 'courier_id', 'package_id',
        'order_date', 'schedule_date','schedule_time_id','status_id',
    ];

    /**
     * ***  this record belongs to a user
     */
    public function user(){
    	return $this->belongsTo('App\User');
    }

    /**
     * ***  this record belongs to a status
     */
    public function status(){
    	return $this->belongsTo('App\Models\Status');
    }

    /**
     * ***  this record belongs to a courier
     */
    public function courier(){
    	return $this->belongsTo('App\Models\Courier');
    }

    /**
     * ***  this record belongs to a time range
     */
    public function time_range(){
    	return $this->belongsTo('App\Models\TimeRange');
    }

    /**
     * ***  this record belongs to a package
     */
    public function package(){
    	return $this->belongsTo('App\Models\Package');
    }

    /**
     * ***  this record belongs to a receipt
     */
    public function receipt(){
        return $this->belongsTo('App\Models\Receipt');
    }

    //  show record page
    public static function show_record($user_id)
    {

      //retrieve record data
      $records = Record::all()->where('gateready_user_id',$user_id);
      
      if($records->isEmpty())
      {
        return view('record',[
          'records' => $records,
        ]);
      }else
      {
        foreach ($records as $record)
        {
          $status[$record->reference_number] = Record::find($record->reference_number)->status;
          $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
        $package[$record->package_id] = Package::find($record->package_id);
        $user[$record->gateready_user_id] = User::find($record->gateready_user_id);
        $payment = $user[$record->gateready_user_id]->credit - $package[$record->package_id]->price ;
        }

        return [
          'records' => $records,
          'status' => $status,
          'time_range' => $time_range,
          'package' => $package,
          'user' => $user,
          'payment' => $payment,
        ];

      }
    }

    //  show schedule delivery page
    public static function show_schedule_delivery($user_id)
    {
      $couriers = Courier::all();
      $time_ranges = TimeRange::all();
      
      return [
        'couriers' => $couriers,
        'time_ranges' => $time_ranges,
      ];
        
    }

    //  post schedule delivery 
    public static function post_schedule_delivery(Request $request)
    {
      // validate input
      $validator = Validator::make($request->all(),[
        'user_id' => 'required',
        'schedule_date' => 'required',
        'package_id' => 'required',
        'tracking_number' => 'required',
        'courier_id' => 'required',
        'time_range_id' => 'required',
      ]);

      return $validator;

      
    }

    //  reschedule the date and time of delivery
    public static function post_reschedule_delivery(Request $request)
    {
      // echo "$record_reference_number";
      //  validate
      $validator = Validator::make(Input::all(),[
        'schedule_date' => 'required',
        'time_range_id' => 'required',
      ]);

      return $validator;

      
    }
}
