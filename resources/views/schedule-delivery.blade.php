@extends('layouts.gateready-app')

@section('title')
Schedule A Delivery
@endsection

@section('css-code')
<style>
body{
	background-color: #ECECEC;
}

div.order-form{
	background-color: white;
	padding: 5% 3%;
}

div.form-group{
	padding: 2% 0%;
}

input, select{
	border:0px hidden transparent;
	border-bottom: 1px solid #000;
	background-color: transparent;
	width:100%;
}

label{
	text-transform: uppercase;
	color:#E4A490;
}

h1.schedule{
	text-align: center;
    padding:10px 20px;
    font-size: 24px;
}

.center-block{
	display:flex;
	justify-content: center;
}

button.submit_button{
    
    text-align: center;
    
    border:2px solid #533F2F;
    color:#533F2F;
    padding: 10px 10px;
    background-color: #CEBFB2;
}

button.submit_button:hover{
	background-color: transparent;
}


</style>
@endsection

@section('content')
<div class="container">
<div class="row order-form">
	<div class="col-md-12">
		<h1 class="schedule">Inform GateReady about your online purchases' details to schedule a delivery</h1>
	</div>
	<div class="col-md-12">
		<div>
			@foreach($errors as $error)
			{{ $error }}
			@endforeach
		</div>
		<form method="post" action="/gateready/records?schedule_delivery=1">
			@csrf
			<div class="form-group">
        <input name="user_id" type="hidden" class="" value="1" >
				{{-- <input name="user_id" type="hidden" class="" value="{{ Auth::user()->id }}" > --}}
				@if($errors->has('user_id'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('user_id') }}
				</span>
				@endif
			</div>
			
			<div class="form-group">
				<label for="package_id">Choose A Plan</label>
				<select name="package_id" class="" required>
					<option></option>
					<option value="1" selected>RM 3.50 per delivery (less than 5kg)</option>
				</select>
				@if($errors->has('package_id'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('package_id') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="tracking_number">Tracking Number</label>
				<input name="tracking_number" type="text" class="" value="" required>
			</div>
			<div class="form-group">
				<label for="courier_id">Courier</label>
				<select name="courier_id" class="" required>
					@foreach($couriers as $courier)

					<option value="{{$courier->id}}" selected>{{$courier->name}}</option>
					@endforeach
				</select>
				@if($errors->has('courier_id'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('courier_id') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="schedule_date">Schedule Your Available Date</label>
				<input name="schedule_date" type="date" class="" value="" required>
				@if($errors->has('schedule_date'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('schedule_date') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="time_range_id">Schedule Your Available Time</label>
				<select name="time_range_id" class="" required>
					@foreach($time_ranges as $time_range)

					<option value="{{$time_range->id}}" selected>{{$time_range->name}}</option>
					@endforeach
				</select>
				@if($errors->has('time_range_id'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('time_range_id') }}
				</span>
				@endif
			</div>
			<div class="form-group center-block">
				<button name="submit_button" type="submit" class=" col-md-6 submit_button">Schedule</button>
			</div>
		</form>
	</div>
</div>
</div>

@endsection




