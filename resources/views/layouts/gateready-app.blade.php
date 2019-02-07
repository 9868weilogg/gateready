<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | GateReady.com - Schedule Package Delivery Service in Universiti Putra Malaysia (UPM)</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- bootstrap 4 -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first (for AJAX), then Bootstrap JS (for modal,dropdown)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">

    <!-- Vue.js cdn -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script> -->

    <!-- insert vue code here -->
    <!-- @yield('vue-code') -->

    <!-- insert javascript here -->
    @yield('js-code')

    <!-- insert CSS here -->
    @yield('css-code')

<style>
body{
  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
}

@font-face{
  font-family: 'LithosPro-Regular';
  src: url('{{asset('lib/LithosPro-Regular.otf')}}');
}
a.nav-link{
  color:#CCA8F9;
}

footer{
  background-color: black;
}

h3.links, h3.social_media,h3.links a{
  color:#E4A490;
  font-weight: normal;
  padding:20px 30px;
}

.links ul li{
  list-style-type:none

}

li a{
  color:rgb(193,193,193);
  font-size:16px;
  padding:10px 10px;
}

i.fa-facebook-official,i.fa-whatsapp,i.fa-envelope-o,i.fa-phone-square{
  font-size: 40px;
  margin:20px 20px;
  color:rgb(193,193,193);
}

p#copyright_year, p#copyright_year a{
  text-align: center;
  color:rgb(193,193,193);
}

label{
    text-transform: uppercase;
    color:#000;
    width:100%;
}

input.form-control{
  border:0px hidden transparent;
  border-bottom: 1px solid #000;
}

div.form-group{
  padding-bottom:20px; 
}

</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/home') }}" style="font-family:'LithosPro-Regular'; "><img src="{{ asset('image/gateready/gateready_logo.jpg') }}" alt="gateready-logo" style="width:50px; height:30px; padding:0px; margin:0px;">GATEREADY
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        {{-- @guest
                            <li class="nav-item">
                                
                                <a class="nav-link" data-toggle="modal" data-target="#instructionModal">Login | Register</a>
                            </li> --}}
                            
                            <li class="nav-item">
                                <a class="nav-link" href="/home?faq=1">FAQ</a>
                            </li>
                        {{-- @else --}}
                            <li class="nav-item">
                                <a class="nav-link" href="/records/create">Experience It</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/records">Record</a>
                            </li>
                        {{-- @endguest --}}
                    </ul>
                </div>
            </div>
        </nav>

        
            @yield('content')
      </div>
    


<footer class="container-fluid" id="footer">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row" >
    <div class="col-lg-5 col-lg-offset-2 col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-1 col-xs-7 links" >
        
        {{-- @guest --}}
        <h3 class=" links" style="font-family:'LithosPro-Regular'; ">GATEREADY</h3>
        {{-- @else
        <h3 class="links" ><a href="/admin" style="font-family:'LithosPro-Regular'; ">GATEREADY</a></h3>
        @endguest --}}
        <ul>
            <li><a href="/home?about=1"  class="links" >About</a></li>
            <li><a href="/home?about=1#howItWorks" class="links" >How It Works?</a></li>
            <li><a href="/home?pricing=1"  class="links" >Pricing and Reward</a></li>
            <li><a href="/home?faq=1"  class="links" >FAQ</a></li>
            <li><a href="/admins"  class="links" >Admin</a></li>
        </ul>
        
        
    </div>
    <div class="col-lg-5 col-md-6 col-sm-5 col-xs-5 social_media" >
        <h3 class="social_media">Social</h3>
        <div class="row">
            <div class="col-md-6 col-xs-6 social_media_i"><a href="https://www.facebook.com/GateReady-512343692305450/" target="_blank"><i class="fa fa-facebook-official"></i></a></div>
            <div class="col-md-6 col-xs-6 social_media_i"><a href="#" data-toggle="modal" data-target="#whatsappModal"><i class="fa fa-whatsapp"></i></a></div>
            <div class="col-md-6 col-xs-6 social_media_i"><a href="#" data-toggle="modal" data-target="#emailModal"><i class="fa fa-envelope-o"></i></a></div>
            <div class="col-md-6 col-xs-6 social_media_i"><a href="#" data-toggle="modal" data-target="#callModal"><i class="fa fa-phone-square"></i></a></div>
        </div>
    </div>
    
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row" align="center">

    <p><a class="freepik" href="http://www.freepik.com/free-photo/man-smiling-with-a-lot-of-boxes_915972.htm">Designed by Freepik</a></p>
    <p id="copyright_year" align="center">© 2018 Design By:
          <a class="dark-grey-text" href="http://weilogg.com"> weilogg.com</a>
    </p>
</div>
</footer>



<!-- instructionModal -->

<div id="instructionModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Login | Register at weilogg.com</h4>
                <button type="button" class="close" data-dismiss="modal" style="float:right;">&times;</button>
            </div>
            <div class="modal-body" align="center">
                <h4 id=""><a href="/#loginReg" class="links" >Click here</a></h4>
            </div>
        </div>
    </div>
</div>
<!-- instructionModal (end)-->

<!-- whatsappModal -->

<div id="whatsappModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Whatsapp GateReady</h4>
                <button type="button" class="close" data-dismiss="modal" style="float:right;">&times;</button>
            </div>
            <div class="modal-body" align="center">
                <h4 id="whatsapp_number">Whatsapp GateReady at <br>+60178713513<br> for more information or help.</h4>
            </div>
        </div>
    </div>
</div>
<!-- whatsappModal (end)-->

<!-- callModal -->

<div id="callModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Call GateReady</h4>
              <button type="button" class="close" data-dismiss="modal" style="float:right;">&times;</button>
                
            </div>
            <div class="modal-body" align="center">
                <h4 id="call_number">Call GateReady at <br>+60178713513<br> for more information or help.</h4>
            </div>
        </div>
    </div>
</div>
<!-- callModal (end)-->

<!-- emailModal -->

<div id="emailModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Email GateReady</h4>
              <button type="button" class="close" data-dismiss="modal" style="float:right;">&times;</button>
                
            </div>
            <div class="modal-body" align="center">
                <h4 id="call_number">Email GateReady at <br>william.wlcheah@gmail.com<br> for more information or help.</h4>
            </div>
        </div>
    </div>
</div>
<!-- emailModal (end)-->
</body>
</html>
