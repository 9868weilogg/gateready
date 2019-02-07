@extends('layouts.gateready-app')

@section('title')
Reschedule Delivery
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

h1.reschedule{
	text-align: center;
    padding:10px 20px;
    font-size: 24px;
}

.center-block{
	display: flex;
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
		<h1 class="reschedule">Reschedule Your Delivery</h1>
	</div>
	<div class="col-md-12">
		<div>
			@foreach($errors as $error)
			{{ $error }}
			@endforeach
		</div>
		<form method="post" action="/gateready/records/{{$record_reference_number}}?reschedule_delivery=1">
			@csrf
			@method('put')
			<div class="form-group row">
				<label class="col-form-label col-md-4 text-md-left" for="schedule_date">Schedule Your Available Date</label>
				<div class="col-md-8">
					<input name="schedule_date" type="date" class="" value="1234" required>
					@if($errors->has('schedule_date'))
					<span class="invalid-feedback" role="alert">
						{{ $errors->first('schedule_date') }}
					</span>
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-md-4 text-md-left" for="time_range_id">Schedule Your Available Time</label>
				<div class="col-md-8">
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
			</div>
			<div class="form-group center-block">
				
					<button name="submit_button" type="submit" class="submit_button  col-md-6  ">Reschedule</button>
				
			</div>
		</form>
	</div>
</div>
</div>





@endsection







