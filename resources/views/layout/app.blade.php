<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'Mavka')}}</title>
    <link rel="icon" href="{{ URL('images/girl1.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}" >
    @yield('css-block')
</head>
<body>
   <div class="mobmenu">
    <div class="logo">
    <img src="{{ URL('images/girl.png') }}">
    <div>MAVKA</div>
    
    </div>
    <div class="burger-menu" onclick="toggleMobileMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <ul class ="mobile-menu">
            <li><a href="{{ url('home') }}">Main</a></li>
            <li><a href="{{ url('menu/all') }}">Menu</a></li>
            <li><a href="{{ url('order_table') }}">Order table</a></li>
            <li><a href="{{ url('delivery') }}">Delivery information</a></li>          
            <li><a href="{{ url('about') }}">About us</a></li>
        </ul>
    </div>
</div> 

   <div id="main">           
       <div class="header"> 
           <div class="logo">
                <img src="{{ URL('images/girl.png') }}">
                <div>MAVKA</div>           
           </div>
           <div class="head">
               <div class="address">Kyiv, Naberechhne highway, Dnipro station, +380442048098</div>
               <div class="menu">
                   <a href="{{ url('home') }}">Main</a>
                   <a href="{{ url('menu/all') }}">Menu</a>
                   <a href="{{ url('order_table') }}">Order table</a>
                   <a href="{{ url('delivery') }}">Delivery information</a>              
                   <a href="{{ url('about') }}">About us</a>
               </div>
           </div>               
       </div> 
       @yield('main')
    </div>
    @yield('body')
     <script src="{{ asset('js/shared.js') }}"></script>
</body>
<footer>
<div class="contacts">
    <div class="small-title">Location</div>
    <div class="text">Kyiv, Naberechhne highway, Dnipro station</div>
</div>
<div class="contacts">
    <div class="small-title">Contacts</div>
    <div class="text">+380442048098 mavka@gmail.com</div>
</div>
<div class="contacts">
    <div class="small-title">About us</div>
    <div class="text">@mavkainsta mavkafacebook</div>
</div>
</footer>