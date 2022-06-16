@extends('layout.app')

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('body')

<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <br>
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                    <td>  </td>
                </tr>
            </thead>
            <tbody>
                @if(empty($products))
                <tr>
                    <td colspan="6" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                @else
                @foreach($products as $product)
                <tr>
                    <td class="img">
                        <a href="item/{{ $product->id }}">
                            <img src="images/{{ $product->image }}" width="50" height="50" alt="{{ $product->name }}">
                        </a>
                    </td>
                    <td class="name">{{ $product->name }}</td>
                    <td class="price">{{ $product->price }} grn</td>
                    <td class="quantity">
                        <form action={{ 'reduce_item/' . $product->id }} method="post">
                            @csrf
                            <input type="submit" value="-">
                            <input name="item_id" type="hidden" value={{ $product->id }}>
                        </form>
                        <div class=”count”>{{ $products_in_cart[$product->id] }}</div>
                        <form action={{ 'increase_item/' . $product->id }} method="post">
                            @csrf
                            <input type="submit" value="+">
                            <input name="item_id" type="hidden" value={{ $product->id }}>
                        </form>
                    </td>
                    <td class="price">{{ $product->price * $products_in_cart[$product->id] }} grn</td>
                    <td class="remove"><div class="remove">
                        <form action={{ 'remove_item/' . $product->id }} method="post">
                            @csrf
                            <input name="delete{{ $product->id}}" type="submit" value="Remove">
                            <input name="item_id" type="hidden" value={{ $product->id }}>
                        </form>
                        </div></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <br><br>
    <div class="table-dishes">
        @if(count($products) > 0)
            @foreach($products as $product)
            <div class="dish">
            <div><img src={{ URL("images/" . $product->image) }}></div>
            <div class="item">
                <div>
                    <div class="name">{{ $product->name }}</div><br>
                    <div class="info">
                        <div class="count">
                            <form action={{ 'reduce_item/' . $product->id }} method="post">
                            @csrf
                            <input type="submit" value="-">
                            <input name="item_id" type="hidden" value={{ $product->id }}><br>
                        </form>
                        <div>{{ $products_in_cart[$product->id] }}</div>
                        <form action={{ 'increase_item/' . $product->id }} method="post">
                            @csrf
                            <input type="submit" value="+">
                            <input name="item_id" type="hidden" value={{ $product->id }}>
                        </form>
                        </div><br>
                        
                        <div class="price">Price: {{ $product->price }} grn</div>
                        <div class="price">Total: {{ $product->price * $products_in_cart[$product->id] }} grn</div><br>
                    </div>
                </div>                              
                <form action={{ 'remove_item/' . $product->id }} method="post">
                            @csrf
                            <input name="delete{{ $product->id}}" type="submit" value="Remove">
                            <input name="item_id" type="hidden" value={{ $product->id }}>
                        </form>
            </div>
            </div>
            @endforeach
        @endif        
    </div>
        <div class="subtotal">
            <br>
            <span class="big-title">Total: {{ $subtotal }} grn</span>
        </div>
    <br>
        <div class="button">
            <br><a href="{{ URL("order_delivery") }}"><button>Place Order</button></a><br>
        </div>
</div>
<br>
@endsection