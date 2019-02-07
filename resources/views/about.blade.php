@extends('layouts.gateready-app')

@section('title')
About Us
@endsection

@section('js-code')
<script>
$(document).ready(function(){
	if(window.location.hash === 'howItWorks')
	{
		$('html,body').animate({
			scrollTop: $('#howItWorks').offset().top
		},3000);
	}
});
</script>
@endsection

@section('css-code')
<style>
body{
	background-color: #ECECEC;
}
h1.about{
	text-align: center;
    padding:10px 20px;
    font-size: 30px;
}
h2.about{
	text-align: center;
    padding:10px 20px;
    font-size: 20px;
    border: 1px solid #000;
    color:white;
    background-color: #000;
}
p.about ,ol.about{
	text-align: justify;
    padding:10px 50px;
    font-size: 16px;
    border:1px solid white;
    background-color: white;
}
</style>
@endsection

@section('content')
<div class="container">
<div class="about row">
	<div class="col-md-12">
		<h1 class="about">About GateReady</h1>
	</div>
	<div class="col-md-12">
		<h2 class="about">What is GateReady?</h2>
		<p class="about">
			GateReady provides services to enhance the experience of receiving online purchases delivery. GateReady is capable to deliver packages with weight that is less than 5kg now. GateReady is available to deliver your packages at 7pm to 10pm every Monday to Friday.
		<br>
		
			Did you have the experience of worrying your online purchases delivery when you are unavailable?
		<br>
			GateReady will help you to receive and keep your online purchases delivery safely from courier. Then, GateReady will deliver to you after you have scheduled a date and time of you convenient.
		</p>
		
	</div>
	<div class="col-md-12">
		
		<h2 class="about">What type of packages does GateReady accept?</h2>
		<p class="about">
			GateReady accepts all type of packages which are less than 5kg for each delivery.
		<br>
			For packages that overweight, RM 2.00 will be charged on every additional 1 kg.
		<br>
			Any further questions?  Please reach out to our support team at support@gateready.com or call us at +60178713513 and we'll be happy to help you!
		</p>
	</div>
	<div class="col-md-12" id="howItWorks">
		
		
		<h2 class="about">Entire process of how does GateReady work.</h2>
		<ol class="about">
			<li>ship your online purchases to GateReady at this address when u checkout your shopping cart.</li>
			<li>inform GateReady about your online purchases’ details at here</li>
			<li>Status will show pending (verification is in progress).</li>
			<li>Status will update to be verified (verification is done).</li>
			<li>You will be notified when your packages arrived at GateReady by SMS.</li>
			<li>Click the link provided in the SMS to schedule a date and time that you are available to receive the packages from GateReady.</li>
			<li>Status will show reschedule after you have scheduled a date and time.</li>
			<li>You are always allow to reschedule the date and time before receiving SMS notification that the packages have departed to your place from GateReady.</li>
			<li>You will receive SMS notification when GateReady is ready to hand over the packages to you.</li>
			<li>You sign and receive the packages, give us your feedback. We will serve you better.</li>
		</ol>
		
	</div>
	<div class="col-md-12">
		
		
		<h2 class="about">Where does GateReady serve?</h2>
		<p class="about">
			GateReady will serve at hostels in Universiti Putra Malaysia and Seri Serdang area.
		</p>
	</div>
</div>
</div>

@endsection