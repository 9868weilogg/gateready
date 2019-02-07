@extends('layouts.gateready-app')

@section('title')
Feedback to GateReady
@endsection

@section('css-code')
<style>
body{
	background-color: #ECECEC;
}
h1.feedback{
	text-align: center;
    padding:10px 20px;
    font-size: 30px;
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
<div class="row">
	
	<div class="col-md-12 order-form">
		<h1 class="feedback">Feedback to us, we will serve you better.</h1>
		@if($errors)
		@foreach($errors as $error)
		{{ $error }}
		@endforeach
		@endif
    <form method="post" action="/records/1">
		{{-- <form method="post" action="/gateready/record/{{ Auth::user()->id }}/feedback/{{ $record_reference_number }}"> --}}
			@csrf
      @method('put')
			<div class="form-group">
				<label for="msg">Feedback Message</label>
				<textarea rows="4" cols="50" name="msg" placeholder="Enter Your Message Here..." class="form-control" autofocus required></textarea>
			</div>
			<div class="form-group center-block">
        <input type="hidden" name="reference" value="{{ $record_reference_number }}">
        <input type="hidden" name="process" value="feedback">
				<button name="submit_button" type="submit" class="submit_button  col-md-6  ">Feedback to Us</button>
			</div>
		</form>
	</div>
</div>
</div>



@endsection




