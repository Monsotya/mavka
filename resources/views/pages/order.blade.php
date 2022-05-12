@extends('layout.app')

<?php if(isset($_POST['name'], $_POST['people'], $_POST['date'], $_POST['phone'])){
    $name = $_POST['name'];
    $people = $_POST['people'];
    $date = $_POST['date'];
    $phone = $_POST['phone'];
    if(empty($name) or empty($people) or empty($date) or empty($phone)){
        $error = 'All fields are required!';
    }
    else{
        header('Location: index.php');
    }
} ?>

@section('css-block')
<link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endsection

@section('body')
<form class="for" action="order.php" method="post">
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
    <?php if(isset($error)){ ?>
            <br /><div class="small-title"><?php echo $error ?></div><br />
        <?php } ?>
</form>
@endsection