@extends('layouts.gateready-app')

@section('title')
Frequent Asked Question
@endsection

@section('css-code')
<style>
body{
	background-color: #ECECEC;
}
h1.faq{
	text-align: center;
    padding:10px 20px;
    font-size: 30px;
}
h2.faq{
	text-align: center;
    padding:10px 20px;
    font-size: 20px;
    border: 1px solid #000;
    color:white;
    background-color: #000;
}
p.faq ,ol.faq{
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
<div class="faq row">
	<div class="col-md-12">
		<h1 class="faq">About GateReady</h1>
	</div>
	<div class="col-md-12">
		<h2 class="faq">What is GateReady?</h2>
		<p class="faq">
			GateReady provides services to enhance the experience of receiving online purchases delivery. GateReady is capable to deliver packages with weight that is less than 5kg now. GateReady is available to deliver your packages at 7pm to 10pm every Monday to Friday.
		<br>
			Did you have the experience of worrying your online purchases delivery when you are unavailable?
		<br>
			GateReady will help you to receive and keep your online purchases delivery safely from courier. Then, GateReady will deliver to you after you have scheduled a date and time of you convenient.
		</p>
		
	</div>
	<div class="col-md-12">
		
		<h2 class="faq">What type of packages does GateReady accept?</h2>
		<p class="faq">
			GateReady accepts all type of packages which are less than 5kg for each delivery.
		<br>
			For packages that overweight, RM 2.00 will be charged on every additional 1 kg.
		<br>
			Any further questions?  Please reach out to our support team at support@gateready.com or call us at +60178713513 and we'll be happy to help you!
		</p>
	</div>
	<div class="col-md-12">
		
		
		<h2 class="faq">Entire process of how does GateReady work.</h2>
		<ol class="faq">
			<li>ship your online purchases to GateReady at this address when u checkout your shopping cart.</li>
			<li>inform GateReady about your online purchases’ details at here</li>
			<li>Status will show pending (verification is in progress).</li>
			<li>Status will update to be verified (verification is done).</li>
			<li>You will be notified when your packages arrived at GateReady by SMS.</li>
			<li>Click the link provided in the SMS to schedule a date and time that you are available to receive the packages from GateReady./li>
			<li>Status will show reschedule after you have scheduled a date and time.</li>
			<li>You are always allow to reschedule the date and time before receiving SMS notification that the packages have departed to your place from GateReady.</li>
			<li>You will receive SMS notification when GateReady is ready to hand over the packages to you.</li>
			<li>You sign and receive the packages, give us your feedback. We will serve you better.</li>
		</ol>
		
	</div>
	<div class="col-md-12">
		
		
		<h2 class="faq">Where does GateReady serve?</h2>
		<p class="faq">
			GateReady will serve at hostels in Universiti Putra Malaysia and Seri Serdang area.
		</p>
	</div>

	<div class="col-md-12">
		<h1 class="faq">GateReady Account</h1>
	</div>

	<div class="col-md-12">
		<h2 class="faq">What if my name is not same as identity card (IC)? (Login/ Register with Facebook)</h2>
		<p class="faq">
			GateReady encourages you to edit it to be the name as IC. This can smoothen the delivery process.
		</p>

	</div>
	<div class="col-md-12">
		<h2 class="faq">Why do you need my contact number?</h2>
		<p class="faq">
			GateReady will notify you the status of your packages through SMS. Therefore, your contact number is for notification purpose only, no spam.

		<br>
			However, if you are not present to receive packages from us after 5 minutes, we will give you a call for remind purpose.
		<br>
			If you are not available, you can reschedule the delivery through the phone call, no additional charges.
		<br>
			If you are not getting any status notifications from us, please contact us and we will be happy to look into it.
		</p>

		
	</div>
	<div class="col-md-12">
		<h2 class="faq">Can I share my GateReady account?</h2>
		<p class="faq">
			Yes. Anyone of your friends and family members can use your GateReady account.
		<br>
			However, they must be ensured that they fill in the name as in your profile when they checkout their shopping cart.
		<br>
			This is because we identify the account through your name and we have no any information about your friends and family members.
		<br>
			GateReady encourages you to give your friends and family members invitation to create their own account.
		<br>
			Both of you will have free credit (worth RM 3.50) after your friends and family members start using service of GateReady.
		</p>

		
	</div>


	<div class="col-md-12">
		<h1 class="faq">Pricing and Rewards</h1>
	</div>
	<div class="col-md-12">
		<h2 class="faq">WHow much does GateReady cost?</h2>
		<p class="faq">
			GateReady offers only a plan which cost RM 3.50 per delivery and the packages’ weight must be less than 5kg.

		<br>
			If the packages are overweight, additional of RM 2.00 for every 1kg will be charged.
		</p>
		
	</div>
	<div class="col-md-12">
		
		<h2 class="faq">How do I pay to GateReady?</h2>
		<p class="faq">
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
		
		
		<h2 class="faq">How to gain the rewards offer by GateReady?</h2>
		<p class="faq">
			It’s super easy. You just have to share the invitation link to your friends in Facebook. After they register and start to use the service of GateReady, you and your friends will get free credit (worth RM 3.50).
		</p>
		
	</div>
	<div class="col-md-12">
		
		
		<h2 class="faq">Can I reschedule the delivery time?</h2>
		<p class="faq">
			Yes, you can always reschedule your available time here before you receive a SMS that notify you that your packages have departed to your place.
		</p>
	</div>
	<div class="col-md-12">
		
		
		<h2 class="faq">Will there be extra charges if I collect my packages late?</h2>
		<p class="faq">
			GateReady will keep your packages safely 30 days for free. If customers unable to collect their packages after 30days, storage fee of RM 0.50/day will be charged after 30 days.
		</p>
	</div>
</div>
</div>

@endsection