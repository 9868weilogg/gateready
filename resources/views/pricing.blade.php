@extends('layouts.gateready-app')

@section('title')
Pricing and Rewards
@endsection

@section('css-code')
<style>
body{
	background-color: #ECECEC;
}
h1.pricing{
	text-align: center;
    padding:10px 20px;
    font-size: 30px;
}
h2.pricing{
	text-align: center;
    padding:10px 20px;
    font-size: 20px;
    border: 1px solid #000;
    color:white;
    background-color: #000;
}
p.pricing ,ol.pricing{
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
<div class="pricing row">
	<div class="col-md-12">
		<h1 class="pricing">Pricing and Rewards</h1>
	</div>
	<div class="col-md-12">
		<h2 class="pricing">How much does GateReady cost?</h2>
		<p class="pricing">
			GateReady offers only a plan which cost RM 3.50 per delivery and the packages’ weight must be less than 5kg.

		<br>
			If the packages are overweight, additional of RM 2.00 for every 1kg will be charged.
		</p>
		
	</div>
	<div class="col-md-12">
		
		<h2 class="pricing">How do I pay to GateReady?</h2>
		<p class="pricing">
			GateReady accept internet banking transfer. Cash on delivery (COD) is unavailable.

		<br>
			For the overweight packages, you will be notified by a SMS and you are required to make payment of the additional charges before receiving the packages of yours.

		<br>
			Internet banking information:

		<br>
			Bank: CIMB Bank | Name: CHEAH WEI LOGG | Account Number: 7016669505
		</p>
	</div>
	<div class="col-md-12">
		
		
		<h2 class="pricing">How to gain the rewards offer by GateReady?</h2>
		<p class="pricing">
			It’s super easy. You just have to share the invitation link to your friends in Facebook. After they register and start to use the service of GateReady, you and your friends will get free credit (worth RM 3.50).
		</p>
		
	</div>
	<div class="col-md-12">
		
		
		<h2 class="pricing">Can I reschedule the delivery time?</h2>
		<p class="pricing">
			Yes, you can always reschedule your available time here before you receive a SMS that notify you that your packages have departed to your place.
		</p>
	</div>
	<div class="col-md-12">
		
		
		<h2 class="pricing">Will there be extra charges if I collect my packages late?</h2>
		<p class="pricing">
			GateReady will keep your packages safely 30 days for free. If customers unable to collect their packages after 30days, storage fee of RM 0.50/day will be charged after 30 days.
		</p>
	</div>
</div>
</div>

@endsection