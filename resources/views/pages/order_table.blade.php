@extends('layout.app')

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/order_table.css') }}">
@endsection

@section('body')
<br>
<form class="for" action="{{ url('order_form') }}" method="post">
    @csrf
    <div class="title">Order information</div><br /><br />
    <div class="form-fields">
        <div class="fields">
        <div class="text">Name:</div><br />
        <input type="text" name="name"><br /><br />
        <div class="text">Number of people:</div><br />
        <input type="number" min="1" max="30" name="people"><br /><br />
    </div>
    <div class="fields">
        <div class="text">Phone number:</div><br />
        <input type="tel" name="phone" pattern="[0-9]{3}-{0-9}{3}-[0-9]{4}"><br /><br />
        <div class="text">Date:</div><br />
        <input type="date" name="date"><br/><br />
        
    </div>
    </div>
    <input type="submit" value="Order" class="button"><br />
    @if(isset($error))
            <br /><div class="small-title">{{ $error }} </div><br />
    @endif
</form>
@endsection