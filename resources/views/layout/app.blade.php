<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'Mavka')}}</title>
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}" >
    @yield('css-block')
</head>
<body>
   <div id="main">           
       <div class="header"> 
           <div class="logo">
                <img src="{{ URL('images/girl.png') }}">
                <div>MAVKA</div>           
           </div>
           <div class="head">
               <div class="address">Kyiv, Naberechhne highway, Dnipro station, +380442048098</div>
               <div class="menu">
                   <a href="/">Main</a>
                   <a href="{{ url('menu/all') }}">Menu</a>
                   <a href="{{ url('order') }}">Order table</a>
                   <a>Delivery</a>
                   <a>Special occasions</a>                
                   <a href="{{ url('about/something') }}">About us</a>
               </div>
           </div>               
       </div> 
       @yield('main')
    </div>
    @yield('body')
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