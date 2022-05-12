<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mavka</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <link rel="stylesheet" href="css/shared.css">
        <link rel="stylesheet" href="css/about.css">
    </head>
    <body>
       <div id="main">           
           <?php include('templates/header.php'); ?>
           <div class="map">
              <div>
                  <div class="big-title">Our address</div>
                  <div class="burger-menu">
                      <img src="../images/menu.png">
                  </div> 
              </div>
              <div>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.92116885443!2d30.554832115352717!3d50.44256899581442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cffe85d3c27b%3A0xdb2449ad3816bcf7!2sOsvyachene%20Dzherelo!5e0!3m2!1sen!2sua!4v1650524705381!5m2!1sen!2sua" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
           </div>
        </div>
        <div id="history">
               <img src="images/nature.jpg">
               <div id="history-text">
                   <div class="big-title">Our history</div>
                   <div class="text">The restaurant was founded by loving couple to spread excellent Ukrainian recipes, one can found almost in every Ukrainian family. Proud Ukrainians and tourists, interested in having lovely time are always welcomed here </div>
               </div>
               
        </div>   
        <div id="gallery">
            <div class="big-title">Gallery</div>
            <div class="photos">
                <div class="photo">
                    <img src="images/inner1.jpg">             
                </div>
                <div class="photo">
                    <img src="images/inner4.jpg">
                </div>
                <div class="photo">
                    <img src="images/inner2.jpg">
                </div>
                <div class="photo">
                    <img src="images/inner3.jpg">
                </div>
            </div>
        </div>
    </body>
    <?php include('templates/footer.php'); ?>       