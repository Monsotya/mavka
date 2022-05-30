@extends('layout.app')

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('body')

<div id="submenu">
    <div id="categories">
        <a href="{{ url('menu/all') }}">All</a>
        <a href="{{ url('menu/salads') }}">Salads</a>
        <a href="{{ url('menu/desserts') }}">Desserts</a>
        <a href="{{ url('menu/soups') }}">Soups</a>
        <a href="{{ url('menu/lunch') }}">Lunch</a>
        <a href="{{ url('menu/meat+dishes') }}">Meat dishes</a>        
        <a href="{{ url('menu/drinks') }}">Alcohol</a>
        <a href="{{ url('menu/snacks') }}">Snacks</a>
    </div>
    <div id="cart">
        
        <img src={{ URL('images/shopping-cart.png') }}>
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
            <div><img src={{ URL("images/" . $item->image) }}></div>
            <div class="item">
                <div>
                    <div class="name">{{ $item->name }}</div>
                    <div class="info">
                        <div class="weight">{{ $item->weight }} g</div>       <span><p></p></span>
                        <div class="price">{{ $item->price }} grn</div>
                    </div>
                </div>                              
                <a href="{{ URL("item/" . $item->id) }}"><button>ORDER</button></a>
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