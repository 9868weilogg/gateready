<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Record;

class Admin extends Model
{
    public static function show_admin()
    {
      $records = Record::all();
      //  parse all status for <select> in change status feature
      $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

      if($records->isEmpty())
      {
        echo "no record";
      }
      else{
        foreach($records as $record)
        {
          $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
          $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
          $status[$record->reference_number] = Record::find($record->reference_number)->status;
          $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
          $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
          $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
        }

        return [
          'records' => $records,
          'courier' => $courier,
          'time_range' => $time_range,
          'status' => $status,
          'location' => $location,
          'address' => $address,
          'customer' => $customer,
          'status_all' => $status_all,
                'location_all' => $location_all,
        ];

        // return view('gateready/admin',[
        //   'records' => $records,
        //   'courier' => $courier,
        //   'time_range' => $time_range,
        //   'status' => $status,
        //   'location' => $location,
        //   'address' => $address,
        //   'customer' => $customer,
        //   'status_all' => $status_all,
        //         'location_all' => $location_all,
        // ]);
            // print_r($status);
            // echo $status[$record->reference_number]->name;
      }
      
    }
}
