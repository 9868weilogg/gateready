@extends('layouts.gateready-app')

@section('title')
Home
@endsection

@section('css-code')
<style>



div.cover{
    position:relative;
    background-image: url('{{asset('image/gateready/OBCCB40.jpg')}}');
    background-position:  center;
    background-size: cover;
    background-repeat: no-repeat;
    width:100%;
    height:600px;
    margin:0;
    padding: 0;
    background-color:#ECECEC;
}

h1.jumbo{
    
    position:absolute;
    width: 400px;
    padding: 0;
    text-align: center;
    top:30%;
    left:30%;
}

button.jumbo{
    position:absolute;
    width: 300px;
    text-align: center;
    top:50%;
    left:35%;
    border:2px solid #533F2F;
    color:#533F2F;
    padding: 10px 10px;
    background-color: #CEBFB2;
}

button.jumbo:hover{
    background-color: transparent;
}

div.what-is-gateready, div.how-it-works , div.what-does-gateready-help , div.pricing-and-rewards{
    background-color: #ECECEC;
    padding-bottom: 5%;
}


div.how-it-works h1 , div.what-does-gateready-help h1  , div.pricing-and-rewards h1 ,div.what-is-gateready h1 {
    text-align: center;
    padding:2% 1%;
    font-size: 30px;
}

div.how-it-works h2, div.what-does-gateready-help h2 , div.pricing-and-rewards h2  {
    text-align: center;
    padding:2% 1%;
    font-size: 20px;
    height:15%;
    color:#533F2F;
}

div.how-it-works p, div.what-does-gateready-help p, div.pricing-and-rewards p , div.what-is-gateready p{
    text-align: center;
    padding:2% 1%;
    font-size: 14px;
    margin:30px 30px;
}

div.what-is-gateready a , div.how-it-works a , div.what-does-gateready-help a , a.button-pricing-and-rewards{
    
    width: 300px;
    text-align: center;
    /*margin:20px auto;*/
    border:2px solid #533F2F;
    color:#533F2F;
    padding: 10px 10px;
    background-color: #CEBFB2;
    height:50px;
}

.center-block{
    display:flex;
    justify-content: center;
}


i.fa-shopping-bag,i.fa-smile-o,i.fa-money,i.fa-clock-o,i.fa-edit,i.fa-calendar,i.fa-truck{
    font-size: 80px;
    position: relative;
    margin:0 auto 0 auto;
    color:#533F2F;
    height:100px;
    padding:0 auto;
}

i.fa-gift,i.fa-credit-card{
    font-size: 80px;
    position: relative;
    margin:0 auto 0 auto;
    color:#594B96;
    height:100px;
    padding:0 auto;
}

i.fa-edit,i.fa-calendar,i.fa-truck{
    font-size: 80px;
    position: relative;
    margin:0 auto 0 auto;
    color:#606060;
    height:100px;
    padding:0 auto;
}

.tnc{
    font-size: 10px;
    margin:10px;
    padding:0;
    width: 100%
}

@media screen and (max-width: 600px){
    /*div.cover{
        position:relative;
        background-image: url('{{asset('image/gateready/OBCCB40.jpg')}}');
        background-position:  center;
        background-size: cover;
        background-repeat: no-repeat;
        width:100%;
        height:600px;
        margin:0;
        padding: 0;
        background-color:#ECECEC;
    }*/

    h1.jumbo{
        font-size: 24px;
        position:absolute;
        width: 200px;
        text-align: center;
        top:30%;
        left:30%;
    }

    button.jumbo{
        position:absolute;
        width: 200px;
        top:40%;
        left:30%;
        font-size: 14px;
    }

    button.jumbo:hover{
        background-color: transparent;
}

</style>
@endsection

@section('content')
<div class="container-fluid">
<div class="jumbotron text-center cover">
    <h1 class="jumbo">Schedule Package Delivery in UPM</h1>
    {{-- @guest
    <button class="jumbo" data-toggle="modal" data-target="#regModal">Experience GateReady now</button>
    @else --}}
    <button class="jumbo" onclick="window.location.href='/records/create'">Experience GateReady now</button>
    {{-- @endguest --}}
    
</div>

    


<div class="what-is-gateready row">
    <div class="col-md-12">
        <h1>
            What is GateReady?
        </h1>
        <p>
            Do you like to shop online? Are you worry about missing your online purchases delivery? 
            Send your online purchases to GateReady! 
            Schedule the date and time of your convenient, we will keep your packages safe and delivery to you at the time.
        </p>
        
    </div>
    <div class="center-block col-md-12">
        <a class="button" role="button" href="/home?about=1">More About GateReady</a>
    </div>
</div>
<div class="how-it-works row">
    <div class="col-md-12">
        <h1>
            How It Works?
        </h1>
    </div>
    <div class="col-md-4">
        <i class="fa fa-truck center-block"></i>
        <h2>
            Send Your Online Purchases To GateReady
        </h2>
        <p>
            Checkout your online purchases and fill in the address given, as shipment address. 
            Then inform GateReady here.
        </p>
    </div>
    <div class="col-md-4">
        <i class="fa fa-calendar center-block"></i>
        <h2>
            Schedule A Time To Receive Package
        </h2>
        <p>
            You will be notified when your packages arrived at GateReady. 
            Schedule the time you are convenient to receive packages from GateReady.


        </p>
    </div>
    <div class="col-md-4">
        <i class="fa fa-edit center-block"></i>
        <h2>
            Sign And Enjoy
        </h2>
        <p>
            Sign and enjoy your online purchases. 
            GateReady is always ready to receive feedback from you.
        </p>
    </div>
    <div class="center-block col-md-12">
        <a class="button" role="button" href="/home?about=1#howItWorks">Entire Process</a>
    </div>
</div>
<div class="what-does-gateready-help row">
    <div class="col-md-12">
        <h1>
            What does GateReady help?
        </h1>
    </div>
    <div class="col-md-3">
        <i class="fa fa-clock-o center-block"></i>
        <h2>
            Be Effective
        </h2>
        <p>
            Spare only the time you have scheduled to receive your packages.
        </p>
    </div>
    <div class="col-md-3">
        <i class="fa fa-money center-block"></i>
        <h2>
            Save Money
        </h2>
        <p>
            No self collect is needed, save the cost of transportation.
        </p>
    </div>
    <div class="col-md-3">
        <i class="fa fa-smile-o center-block"></i>
        <h2>
            Be Happy
        </h2>
        <p>
            No worry if you are not available at the scheduled time, you can always reschedule the time.
        </p>
    </div>
    <div class="col-md-3">
        <i class="fa fa-shopping-bag center-block"></i>
        <h2>
            Enjoy Shopping Online
        </h2>
        <p>
            Let GateReady helps you and do not worry about missing your online purchases delivery.
        </p>
    </div>
    <div class="center-block col-md-12">
        {{-- @guest
        <a class="button" data-toggle="modal" data-target="#regModal">Experience GateReady now</a>
        @else --}}
        <a class="button" role="button" href="/records/create">Experience GateReady now</a>
        {{-- @endguest --}}
    </div>
</div>
<div class="pricing-and-rewards row">
    <div class="col-md-12">
        <h1>
            Pricing and Rewards
        </h1>
    </div>
    
    <div class="col-md-6">
        <i class="fa fa-credit-card center-block"></i>
        <h2>
            Pricing
        </h2>
        <p>
            RM 3.50 for each delivery (total weight less than 5kg)
        </p>
        <div class="center-block">
            <a class="button-pricing-and-rewards" href="/home?pricing=1">More about Pricing</a>
            
        </div>
        <div class="tnc center-block">
            GateReady offers you free delivery for the first time.
        </div>
    </div>
    <div class="col-md-6">
        <i class="fa fa-gift center-block"></i>
        <h2>
            Rewards
        </h2>
        <p>
            Share this to your friends. After they have experienced the free delivery offered by GateReady, both of you will enjoy free credit. (worth RM 3.50 each)
        </p>
       
    </div>
</div>

</div>





@endsection

