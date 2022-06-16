@extends('layout.app')

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('body')
<div id="submenu">
    
    
    <br>
    <div id="categories">
        <a href="{{ url('menu/all') }}">All</a>
        <a href="{{ url('menu/salads') }}">Salads</a>
        <a href="{{ url('menu/desserts') }}">Desserts</a>
        <a href="{{ url('menu/lunch') }}">Lunch</a>
        <a href="{{ url('menu/meat+dishes') }}">Meat dishes</a> 
        <a href="{{ url('menu/soups') }}">Soups</a>
        <a href="{{ url('menu/drinks') }}">Drinks</a>
        <a href="{{ url('menu/snacks') }}">Snacks</a>
    </div>
    <div id="cart">
        
        <a href="{{ url('cart') }}"><img src={{ URL('images/shopping-cart.png') }}></a>
        <p class="text">{{ isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0 }}</p>
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

<div>
    <div>{!! $list->links() !!}</div>
</div>

@endsection