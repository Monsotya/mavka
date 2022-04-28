<?php if(isset($_POST['name'], $_POST['people'], $_POST['date'], $_POST['phone'])){
    $name = $_POST['name'];
    $people = $_POST['people'];
    $date = $_POST['date'];
    $phone = $_POST['phone'];
    if(empty($name) or empty($people) or empty($date) or empty($phone)){
        $error = 'All fields are required!';
    }
    else{
        header('Location: ../index.php');
    }
} ?>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mavka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="../css/order.css">
    
</head>
<body>           
    <div class="header">
        <div class="logo">
            <img src="../images/girl.png">
            <div>MAVKA</div>   
        </div>
        <div class="head">
            <div class="address">Kyiv, Naberechhne highway, Dnipro station, +380442048098</div>
            <div class="menu">
                <a href="../index.php?name=mavka&theme=restaurant">Main</a>
                <a>Menu</a>
                <a>Order table</a>
                <a>Delivery</a>
                <a>Special occasions</a>                
                <a href="about.php?name=mavka&theme=restaurant">About us</a>
           </div>
        </div>               
    </div>
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
</body>
<footer>
    <div class="contacts">
        <div class="small-title">Location</div>
        <div class="text">Kyiv, Naberechhne highway, Dnipro station</div>
    </div>
    <div class="contacts">
        <div class="small-title">Contacts</div>
        <div class="text">+380442048098
        mavka@gmail.com</div>
    </div>
    <div class="contacts">
        <div class="small-title">About us</div>
        <div class="text">@mavkainsta
    mavkafacebook</div>
    </div>
</footer>
</html>