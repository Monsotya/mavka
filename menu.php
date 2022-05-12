<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mavka</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/shared.css">
        <link rel="stylesheet" href="css/menu.css">
        
    </head>
    <body>           
        <?php include('templates/header.php'); ?>
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
                <?php
                include('templates/dish.php');
                $json = file_get_contents('data.json');
                $data = json_decode($json,true);
                $class = new Dish();
                $list = array();
                foreach ($data AS $value) {
                    $dish = new Dish();
                    $dish->set_name($value["name"]);
                    $dish->set_price($value["price"]);
                    $dish->set_weight($value["weight"]);
                    $dish->set_image($value["image"]);
                    
                    array_push($list, $dish);
                }
                foreach ($list as $item){
                    ?>
                    <div class="dish">
                    <div><img src="<?=$item->get_image();?>" ></div>
                    <div class="item">
                        <div>
                            <div class="name"><?php print_r($item->get_name()) ?></div>
                            <div class="info">
                                <div class="weight"><?php print_r($item->get_weight()) ?></div>       <span><p></p></span>
                                <div class="price"><?php print_r($item->get_price()) ?></div>
                            </div>
                        </div>
                                                
                        <button>ORDER</button>
                    </div>
                    </div>
                <?php 
                }
                ?>
                
            </div>
        </div>
        <div class="text">1 of 8</div>
        <div class="pagination">
              
              <a href="#" >&lt;</a>
              <a href="#">&gt;</a>
        </div>
    </body>
    <?php include('templates/footer.php'); ?>