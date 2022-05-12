@extends('layout.app')

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('main')           
                 
<div id="cuisine">
   <div class="header-mobile">
   <div class="logo">
    <img src="{{ URL('images/girl.png') }}">
    <div>MAVKA</div>
    
    </div>
    <div class="burger-menu">
        <img src="{{ URL('images/menu.png') }}">
    </div>               
</div>     
    <div class="title">Ukrainian cuisine restaurant</div>
    <div class="text">Visit our restaurant to get unforgettable experience exloring Ukrainian unique culture and tasting traditional dishes</div>
    <button class="button">ORDER TABLE</button>
</div>

@endsection

@section('body')
           
<div id="strengthes">
    <div class="big-title">OUR STRENGTHES</div>
    <div class="strengthes-block">
        <div class="strength">
           <img src="{{ URL('images/hot.png') }}">
            <div>Authentic Ukrainian dishes</div>
        </div>
        <div class="strength">
            <img src="{{ URL('images/chef.png') }}">
            <div>Michelin star chef</div>  
        </div>
        <div class="strength">
             <img src="{{ URL('images/waves.png') }}">
             <div>Dnipro river view</div>
        </div>
        <div class="strength">
             <img src="{{ URL('images/grocery-bag.png') }}">
             <div>Always fresh groceries</div>
        </div>
        <div class="strength">
            <img src="{{ URL('images/waiter.png') }}">
            <div>Wonderful service</div>
        </div>
        <div class="strength">
            <img src="{{ URL('images/wine.png') }}">
            <div>Best sommelier</div>
        </div>
    </div> 
     
</div>
<div id="history">
    <div id="history-block">
       <div class="title">Our history</div>
       <div class="text">The restaurant was founded by loving couple to spread excellent Ukrainian recipes, one can found almost in every Ukrainian family. Proud Ukrainians and tourists, interested in having lovely time are always welcomed here </div>
   </div>
</div>
<div id="dishes">
    <div class="big-title">MOST ADMIRED DISHES</div>
    <div class="dishes-block">
        <div class="dish">
            <div><img src="{{ URL('images/pancakes.jpg') }}"></div>
            <div class="name">Pancakes</div>
            <div class="text">145 grn</div>
        </div>
        <div class="dish">
            <div><img src="{{ URL('images/chicken.jpg') }}"></div>
            <div class="name">Kyiv chiken</div>
            <div class="text">150 grn</div>
        </div>
        <div class="dish">
            <div><img src="{{ URL('images/potato.jpg') }}"></div>
            <div class="name">Potato pancakes</div>
            <div class="text">190 grn</div>
        </div>
        <div class="dish">
            <div><img src="{{ URL('images/varenyky.jpg') }}"></div>
            <div class="name">Varenyky</div>
            <div class="text">150 grn</div>
        </div>
        <div class="dish">
            <div><img src="{{ URL('images/salo.jpg') }}"></div>
            <div class="name">Salo</div>
            <div class="text">120 grn</div>
        </div>
        <div class="dish">
            <div><img src="{{ URL('images/borsch.jpg') }}"></div>
            <div class="name">Borsch</div>
            <div class="text">150 grn</div>
        </div>
    </div>
</div>
@endsection