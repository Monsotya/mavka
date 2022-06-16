@extends('layout.app')

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/delivery.css') }}">
@endsection

@section('body')

<div class="delivery">
<div class="big-title">Delivery</div>
<br>
<div class="text">We offer a free delivery in Kyiv, for the towns near Kyiv there is a possibility to deliver, but this will be discusssing over the phone for additional fee. We order deliery 24 hours a day, 7 days a week. If the delivery in Kyiv is more than 1 hour 30 minutes - the order is free. We offer tasty food for fair prices, hope to get order from you soon;)</div>
<br>
<img src={{ URL("images/delivery.jpg") }}>
</div>

@endsection