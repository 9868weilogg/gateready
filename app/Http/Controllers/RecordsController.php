<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Traits\CodeGenerator;
use App\Http\Resources\RecordResource;

use App\Models\Record;
use App\Models\Package;
use App\Models\Courier;
use App\Models\TimeRange;
use App\User;

use Auth;
use PDF;

class RecordsController extends Controller
{
    //  insert traits code that reusable (Code Generator)
    use CodeGenerator;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Record::show_record(1);
        // $data = Record::show_record(Auth::user()->id);
        $records = $data['records'];
        if(!$records->isEmpty()){
          $status = $data['status'];
          $time_range = $data['time_range'];
          $package = $data['package'];
          $user = $data['user'];
          $payment = $data['payment'];
        }
        
        
        return view('records.index',compact('records','time_range','package','user','payment','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = Record::show_schedule_delivery(1);
        // $data = Record::show_schedule_delivery(Auth::user()->id);
        $couriers = $data['couriers'];
        $time_ranges = $data['time_ranges'];

        return view('records.create',compact('couriers','time_ranges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->process == "schedule_delivery") {
          $validator = Record::post_schedule_delivery($request);
          //  if validation fail
          if($validator->fails())
          {
            return Redirect::to('records/create')->withErrors($validator)->withInput();
          }
          else
          {
            $record = new Record;
            $record->gateready_user_id = 1;
            // $record->gateready_user_id = Auth::user()->id;
            $record->tracking_number = $request->tracking_number;
            $record->courier_id = $request->courier_id;
            $record->package_id = $request->package_id;
            $record->schedule_date = $request->schedule_date;
            $record->time_range_id = $request->time_range_id;
            $record->reference_number = $this->generate_code('reference_number');
            // hard code for testing - database set to be not null
            
            $record->status_id = 2;
            $record->message = 'nil';
            $record->save();

            return Redirect::to('/records');
          }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if($request->print == "invoice") {
          $data = ['title' => 'Invoice'];
          $pdf = PDF::loadView('/invoice',$data);
        
          return $pdf->stream();
        } elseif($request->print == "receipt") {
          $data = ['title' => 'Receipt'];
          $pdf = PDF::loadView('/receipt',$data);

          return $pdf->stream();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if($request->process == "reschedule_delivery") {
          $time_ranges = TimeRange::all();
            return view('records.edit',[
            'record_reference_number' => $id,
            'time_ranges' => $time_ranges,
          ]);
        } elseif ($request->process == "feedback") {
          return view('feedback',[
            'user_id' => 1,
            'record_reference_number' => $id,
          ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->process == "reschedule_delivery") {
          $validator = Record::post_reschedule_delivery($request);
          //  if validation fail
          if($validator->fails())
          {
            return Redirect::to('/records/'. $id .'/edit?process=reschedule_delivery')->withErrors($validator)->withInput();
          }
          else
          {
            // echo Input::get('schedule_date');
            // echo $record_reference_number;
            // echo $user_id;
            Record::where([
              'reference_number' => $id,
              'gateready_user_id' => 1,
              // 'gateready_user_id' => Auth::user()->id,
            ])->update([
              'schedule_date' => $request->schedule_date,
              'time_range_id' => $request->time_range_id,
            ]);

            return Redirect::to('records');
          }
        } elseif($request->process == "feedback") {
          // echo "$record_reference_number";
          //  validate the input
          $validator = Validator::make(Input::all(),[
            'msg' => 'required',
          ]);

          //  if validator fail
          if($validator->fails())
          {
            return Redirect::to('records/1/edit?reference=' . $request->reference .'process=feedback')->withErrors($validator);
            // return Redirect::to('records/' .$id .'/edit?feedback=1')->withErrors($validator);
            // echo "$record_reference_number";

          }
          else
          {
            Record::where([
              'gateready_user_id' => 1,
              // 'gateready_user_id' => Auth::user()->id,
              'reference_number' => $request->reference,
            ])->update([
              
              'message' => $request->msg,
            ]);
            return Redirect::to('records');
          }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    

}
