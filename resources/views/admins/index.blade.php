@extends('layouts.gateready-app')

@section('title')
Admin
@endsection

@section('js-code')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    

    // show all records using AJAX
    $(document).ready(function(){
        $('body').on('click','#showAllRecordsAjaxBtn',function(){
            $.ajax({
                url:'/admins?get=show_all_records_ajax',
                type:'GET',
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    // console.log(data);
                },
                error:function(data){
                  // console.log(data);
                }
            })
            // console.log('button works');
        });
        
    });

    // show today records using AJAX
    $(document).ready(function(){
        $('body').on('click','#showTodayRecordsAjaxBtn',function(){
            $.ajax({
                url:'/admins?get=show_today_records_ajax',
                type:'GET',
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    // console.log(data);
                },
                error:function(data){
                  console.log(data);
                }
            })
            // console.log('button works');
        });
        
    });

    // show today delivery using AJAX
    $(document).ready(function(){
        $('body').on('click','#showTodayDeliveryAjaxBtn',function(){
            $.ajax({
                url:'/admins?get=show_today_delivery_ajax',
                type:'GET',
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    // console.log(data);
                },
                error:function(data){
                  // console.log(data);
                }
            })
            // console.log('button works');
        });
        
    });

    // show today remaining delivery using AJAX
    $(document).ready(function(){
        $('body').on('click','#showTodayRemainingDeliveryAjaxBtn',function(){
            $.ajax({
                url:'/admins?get=show_today_remaining_delivery_ajax',
                type:'GET',
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    // console.log(data);
                },
                error:function(data){
                    // console.log(data);

                }
            })
            // console.log('button works');
        });
        
    });

    // filter tracking number using AJAX
    $(document).ready(function(){
        $('body').on('click','#filterTrackingNumberAjaxBtn',function(e){
            e.preventDefault();
            var trackingNumber = $('#trackingNumberInput').val();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
                url:"/admins?get=filter_tracking_number_ajax",
                type:'get',
                data: {tracking_number:trackingNumber},
                
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    // if($('#indexTable').length >0)
                    // {
                    //     $('#indexTable').hide();
                    // }
                    
                    // console.log(data);
                }
                
            });
            // console.log('button works');
            // console.log(trackingNumber);            
        });


    });

    // select status update
    $(document).ready(function(){
        $('body').on('change','.status-select',function(e){
            // this.form.submit(function(e){
                e.preventDefault();
            // });
            
            var recordReferenceNumber = $(this).attr('referenceNumber');
            var statusId = $(this).val();
            var userId = $(this).attr('userId');
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
                url:'/admins/'+recordReferenceNumber,
                type:'post',
                data:{
                  _method: 'put',
                  status_id:statusId , 
                  reference_number:recordReferenceNumber , 
                  user_id:userId,
                  process: "edit_status_ajax",
                },
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    // console.log(data);
                },
                error:function(data){
                    
                    // console.log(data);
                }
            })
            // console.log(recordReferenceNumber + "|" +statusId + "|" +userId);
        });
    });
    
    
    
</script>
@endsection

@section('content')

<!-- if signed in user is weilogg mean he is admin, show the content -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid top">
    
    
    <div class="filter_btn">
    <!-- all record button -->
      <button id="showAllRecordsAjaxBtn" class="btn btn-default">
        All records
      </button>
    <!-- created today fitler client record button -->
      <button class="btn btn-default" id="showTodayRecordsAjaxBtn">
        Created today records
      </button>
    <!-- today delivery record button -->   
      <button class="btn btn-default" id="showTodayDeliveryAjaxBtn">
          Today delivery
      </button>
    <!-- today remaining delivery record button -->  
      <button class="btn btn-default" id="showTodayRemainingDeliveryAjaxBtn">
          Today remaining delivery
      </button>
    </div>
    <div class="filter_btn">
      <!-- search client record using tracking_number (for AJAX)-->
      <input id="trackingNumberInput" type="text" name="tracking_number" placeholder="Tracking Number" required>

      <button name="filter_tracking_number" class="btn btn-default" id="filterTrackingNumberAjaxBtn" type="submit">Search Tracking Number</button>
    </div>
    

    <!-- div to innerHTML -->
    <div id="ajaxResult"></div>

    <!-- $records->render() -->

    <div class="all_records" id="allRecordDiv">
        
        <table class="table table-striped panel panel-warning">
            <thead class="panel-heading">
                <th>Customer Name & Number</th>
                <th>Tracking Number</th>
                <th>Courier Name</th>
                <th>Order Date</th>
                <th>Schedule Date</th>
                <th>Schedule Time</th>
                <th>Contact Number</th>
                <th>Location</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach($records as $record)
                @if(!$record)
                <tr>
                    No records.
                </tr>
                @else

                
                <tr>
                  <td>{{ $customer[$record->gateready_user_id]->name }} , {{ $customer[$record->gateready_user_id]->id }}</td>
                  <td>{{ $record->tracking_number }}</td>
                  <td>{{ $courier[$record->reference_number]->name }}</td>
                  <td>{{ $record->created_at }}</td>
                  <td>{{ $record->schedule_date }}</td>
                  <td>{{ $time_range[$record->reference_number]->name }}</td>
                  <td>{{ $customer[$record->gateready_user_id]->contact_number }}</td>
                  <!-- if location is within UPM kolej -->
                  {{-- @if($location[$record->gateready_user_id]->name != 'Seri Serdang') --}}
                  {{-- <td>{{ $location[$record->gateready_user_id]->name }}</td> --}}
                  <!-- if location is in Seri Serdang -->
                  {{-- @else --}}
                  <td>
                    {{-- {{ $address[$record->gateready_user_id]->address_line_1 }}<br>
                    {{ $address[$record->gateready_user_id]->address_line_2 }}<br>
                    {{ $location[$record->gateready_user_id]->name }} --}}
                  </td>
                  {{-- @endif --}}
                  <!-- form to edit customer's delivery status -->
                  <td>
                    <p>{{$status[$record->reference_number]->name}}</p>
                        
                        
                      
                      <select name="status_id" class="status-select" referenceNumber="{{ $record->reference_number }}" userId="{{$record->gateready_user_id}}">
                        <option >Choose Status</option>
                        @foreach($status_all as $status_a)
                        
                        
                        <option value="{{ $status_a->id }}" >{{ $status_a->name }}</option>
                                
                        @endforeach
                        
                      </select>
                      
                  </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>


    
</div>


@endsection

