@extends('layout.app')

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('main')

<div class="map">
   <div>
       <div class="big-title">Our address</div>
       <div class="burger-menu">
           <img src="{{ URL('images/menu.png') }}">
       </div> 
   </div>
   <div>
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.92116885443!2d30.554832115352717!3d50.44256899581442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cffe85d3c27b%3A0xdb2449ad3816bcf7!2sOsvyachene%20Dzherelo!5e0!3m2!1sen!2sua!4v1650524705381!5m2!1sen!2sua" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>
</div>

@endsection

@section('body')

<div id="history">
       <img src="{{ URL('images/nature.jpg') }}">
       <div id="history-text">
           <div class="big-title">Our history</div>
           <div class="text">The restaurant was founded by loving couple to spread excellent Ukrainian recipes, one can found almost in every Ukrainian family. Proud Ukrainians and tourists, interested in having lovely time are always welcomed here </div>
       </div>       
</div>   
<div id="gallery">
    <div class="big-title">Gallery</div>
    <div class="photos">
        <div class="photo">
            <img src="{{ URL('images/inner1.jpg') }}">       
        </div>
        <div class="photo">
            <img src="{{ URL('images/inner4.jpg') }}">
        </div>
        <div class="photo">
            <img src="{{ URL('images/inner2.jpg') }}">
        </div>
        <div class="photo">
            <img src="{{ URL('images/inner3.jpg') }}">
        </div>
    </div>
</div>

@endsection