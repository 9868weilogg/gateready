@extends('layouts.gateready.gateready-app-ajax')

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
                url:'/gateready/admin/show-all-records-ajax',
                type:'GET',
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
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
                url:'/gateready/admin/show-today-records-ajax',
                type:'GET',
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
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
                url:'/gateready/admin/show-today-delivery-ajax',
                type:'GET',
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    console.log(data);
                }
            })
            // console.log('button works');
        });
        
    });

    // show today remaining delivery using AJAX
    $(document).ready(function(){
        $('body').on('click','#showTodayRemainingDeliveryAjaxBtn',function(){
            $.ajax({
                url:'/gateready/admin/show-today-remaining-delivery-ajax',
                type:'GET',
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    console.log(data);
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
                url:"/gateready/admin/filter-tracking-number-ajax",
                type:'post',
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
                url:'/gateready/admin/edit-status-ajax/'+recordReferenceNumber,
                type:'post',
                data:{status_id:statusId , reference_number:recordReferenceNumber , user_id:userId},
                beforeSend:function(){
                    $('#ajaxResult').html('');
                    $('#allRecordDiv').hide();
                },
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    // console.log(data);
                }
            })
            // console.log(recordReferenceNumber + "|" +statusId + "|" +userId);
        });
    });
    
    
    
</script>
@endsection

@section('content')


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
        	@if($location[$record->gateready_user_id]->name != 'Seri Serdang')
        	<td>{{ $location[$record->gateready_user_id]->name }}</td>
        	<!-- if location is in Seri Serdang -->
        	@else
        	<td>
        		{{ $address[$record->gateready_user_id]->address_line_1 }}<br>
        		{{ $address[$record->gateready_user_id]->address_line_2 }}<br>
        		{{ $location[$record->gateready_user_id]->name }}
        	</td>
        	@endif
        	<!-- form to edit customer's delivery status -->
        	<td>
        		<p>{{$status[$record->reference_number]->name}}</p>
                
                
            	<form method="post" action="/gateready/admin/edit-status-ajax/{{ $record->reference_number }}">
            		@csrf
            		
            		<select name="status_id" class="status-select" referenceNumber="{{ $record->reference_number }}" userId="{{$record->gateready_user_id}}">
                        <option >Choose Status</option>
                        @foreach($status_all as $status_a)
                        
                        
                        <option value="{{ $status_a->id }}" >{{ $status_a->name }}</option>
                        
                        @endforeach
                        
                    </select>
                    
                    <input type="hidden" name="user_id" value="{{$record->gateready_user_id}}">
                   
            	</form>
        	</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>





@endsection

