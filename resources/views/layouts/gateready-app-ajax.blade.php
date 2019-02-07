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
  padding: :10px 10px;
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
        

        
            @yield('content')
      </div>
    


</body>
</html>
