@extends('layout.app')

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('body')

<div class="dish">
    <div><img src={{ URL('images/' . $item->image) }}></div>
    <div class="item">
        <div>
            <div class="name">{{ $item->name }}</div>
            <div class="tag">Category:
            <a href="{{ url('menu/' . $tag) }}">{{ $tag }}</a></div>
            <div class="ingrediends">Ingredients: 
                @if(count($ingredients) > 0)
                    @foreach ($ingredients as $ingredient)
                        <a  href="{{ url('menu/all?ingredient=' . $ingredient->name) }}"> {{ $ingredient->name }}</a>
                    @endforeach
                @endif </div>
            <div class="info">
                <div class="weight">{{ $item->weight }} g</div>       <span><p></p></span>
                <div class="price">{{ $item->price }} grn</div>
            </div>
        </div>
        <p></p>
        <form action="{{ url('add_cart') }}" method="post">
            @csrf
            <input type="number" name="quantity" value="1" min="1" max="20>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$item->id?>" required><p></p>
            <input type="submit" value="Add To Cart">
        </form>
    </div>
</div> 

@endsection