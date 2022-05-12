@extends('layout.app')

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('body')

<div id="submenu">
    <div id="categories">
        <a>Salads</a>
        <a>Breakfast</a>
        <a>Soups</a>
        <a>Lunch</a>
        <a>Meat dishes</a>
        
        <a>Alcohol</a>
        <a>Snacks</a>
    </div>
    <div id="cart">
        
        <img src="images/shopping-cart.png">
        <p class="text">0</p>
    </div>
    <div class="burger-menu">
           <img src="images/menu.png">
    </div> 
</div>

<div id="dishes">
    <div class="table-dishes">
        @if(count($list) > 0)
            @foreach ($list as $item)
            <div class="dish">
            <div><img src="{{ $item->get_image() }}" ></div>
            <div class="item">
                <div>
                    <div class="name">{{ $item->get_name() }}</div>
                    <div class="info">
                        <div class="weight">{{ $item->get_weight() }}</div>       <span><p></p></span>
                        <div class="price">{{ $item->get_price() }}</div>
                    </div>
                </div>                              
                <button>ORDER</button>
            </div>
            </div>
            @endforeach
        @endif        
    </div>
</div>
<div class="text">1 of 1</div>
<div class="pagination">
      
      <a href="#" >&lt;</a>
      <a href="#">&gt;</a>
</div>

@endsection