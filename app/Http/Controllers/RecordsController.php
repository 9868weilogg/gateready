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
        
        
        return view('record',compact('records','time_range','package','user','payment','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->schedule_delivery) {
          $data = Record::show_schedule_delivery(1);
          // $data = Record::show_schedule_delivery(Auth::user()->id);
          $couriers = $data['couriers'];
          $time_ranges = $data['time_ranges'];

          return view('schedule-delivery',compact('couriers','time_ranges'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->schedule_delivery) {
          $validator = Record::post_schedule_delivery($request);
          //  if validation fail
          if($validator->fails())
          {
            return Redirect::to('records/create/?schedule-delivery=1')->withErrors($validator)->withInput();
          }
          else
          {
            $record = new Record;
            $record->gateready_user_id = Auth::user()->id;
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if($request->reschedule_delivery) {
          $time_ranges = TimeRange::all();
            return view('reschedule-delivery',[
            'record_reference_number' => $id,
            'time_ranges' => $time_ranges,
          ]);
        } elseif ($request->feedback) {
          return view('feedback',[
            'user_id' => Auth::user()->id,
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
        if($request->reschedule_delivery) {
          $validator = Record::post_reschedule_delivery($request);
          //  if validation fail
          if($validator->fails())
          {
            return Redirect::to('/records/'. $id .'/edit?reschedule_delivery=1')->withErrors($validator)->withInput();
          }
          else
          {
            // echo Input::get('schedule_date');
            // echo $record_reference_number;
            // echo $user_id;
            Record::where([
              'reference_number' => $id,
              'gateready_user_id' => Auth::user()->id,
            ])->update([
              'schedule_date' => $request->schedule_date,
              'time_range_id' => $request->time_range_id,
            ]);

            return Redirect::to('records');
          }
        } elseif($request->feedback) {
          // echo "$record_reference_number";
          //  validate the input
          $validator = Validator::make(Input::all(),[
            'msg' => 'required',
          ]);

          //  if validator fail
          if($validator->fails())
          {
            return Redirect::to('records/' .$id .'/edit?feedback=1')->withErrors($validator);
            // echo "$record_reference_number";

          }
          else
          {
            Record::where([
              'gateready_user_id' => Auth::user()->id,
              'reference_number' => $id,
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

    

    

    

    // //  show schedule delivery page
    // public function show_reschedule_delivery(Request $request, $user_id, $record_reference_number)
    // {
    //  $time_ranges = TimeRange::all();
    //     return view('reschedule-delivery',[
    //    'record_reference_number' => $record_reference_number,
    //         'time_ranges' => $time_ranges,
    //  ]);
    // }

    

    

    /****
    ***
    ***   generate random code
    ***
    ***/
    public function insert_gateready_user_id()
    {
      // $code = $this->generate_code('');
      // echo $code;
    }

    /****
    ***
    ***   print invoice
    ***   Display a listing of resource.
    ***   @return \Illuminate\Http\Response
    ***
    ***/
    public function print_invoice($user_id,$record_reference_number)
    {
      $data = ['title' => 'Invoice'];
      $pdf = PDF::loadView('/invoice',$data);
      

      return $pdf->download('invoice.pdf');
    }

    /****
    ***
    ***   print receipt
    ***   Display a listing of resource.
    ***   @return \Illuminate\Http\Response
    ***
    ***/
    public function print_receipt($user_id,$record_reference_number)
    {
      $data = ['title' => 'Receipt'];
      $pdf = PDF::loadView('/receipt',$data);

      return $pdf->download('receipt.pdf');
    }
}
