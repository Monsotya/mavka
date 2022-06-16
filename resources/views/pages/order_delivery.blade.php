@extends('layout.app')

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/order_delivery.css') }}">
@endsection

@section('body')

<table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                @if(empty($products))
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
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
                        <div class=”count”>{{ $products_in_cart[$product->id] }}</div>
                    </td>
                    <td class="price">{{ $product->price * $products_in_cart[$product->id] }} grn</td>
                    
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
                            
                        <div>Quantity: {{ $products_in_cart[$product->id] }}</div>
                        
                        </div>
                        
                        <div class="price">Price: {{ $product->price }} grn</div>
                        <div class="price">Total: {{ $product->price * $products_in_cart[$product->id] }} grn</div><br>
                    </div>
                </div>                              
                
            </div>
            </div>
            @endforeach
        @endif        
    </div>
<div class="subtotal">
            <span class="big-title">Total: {{ $subtotal }} grn</span>
        </div>
<br><br><br>
<form class="for" action="{{ url('confirm_order') }}" method="post">
    @csrf
    <div class="form-fields">
        <div class="field">
        <div class="text">Name:</div><br />
        <input type="text" name="name">
        </div>
        <div class="field">
        <div class="text">People number:</div><br />
        <input type="number" min="1" max="30" name="people">
        </div>
        <div class="field">
        <div class="text">Phone number:</div><br />
        <input type="tel" name="phone" pattern="[0-9]{3}-{0-9}{3}-[0-9]{4}"><br /><br />
        </div>
        
    </div>
    <input type="submit" value="Confirm order" class="button"><br /><br><br>
    @if(isset($error))
            <br /><div class="small-title">{{ $error }} </div><br />
    @endif
</form>
@endsection