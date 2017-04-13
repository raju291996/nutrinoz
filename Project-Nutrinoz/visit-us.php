<?php include('includes/session.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Locate - Nutronoz</title>
    <link rel="icon" href="images/icon-logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    <script type="text/javascript">WebFont.load({
       google: {
         families: ["Montserrat:400,700","Unna:regular","Source Sans Pro:regular,italic,700","Raleway:300,regular,500,600,700,800,900","Libre Baskerville:regular,italic,700"]
       } });
    </script>
</head>
<body>
     <?php include('includes/header.php'); ?>
    
    <div class="p-n1-menu">
        <div class="p-n1-content p-n-m-content">
            <p class="n1-title n-m-title">visit-us</p>
            <p class="n1-subtitle n-m-subtitle">Make Plan To Visit Us</p>
            <hr style="border-top:2px solid #57b63a;width:20%;" align="left"/>
        </div>
    </div>
   
    <div class="p-n2-visit" id="visit-page">
        <div class="n-v-content">
            <div class="col-md-7 col-sm-7 g-map"><div id="google-map"></div></div>
            <div class="col-md-5 col-sm-5 g-loc">
                <div class="loc">
                    <div class="mini-title">Locate us</div>
                    <h2 class="h2-heading">Nutrinoz Restaurant <br> Welcomes You at</h2>
                    <hr style="border-top:2px solid #57b63a;width:25%;" align="left"/>
                    <p class="address ape"><img src="images/loc.png"/> Roorkee, Haridwar, Uttrakhand, 247667</p>
                    <p class="email ape"><img src="images/em.png" /> care@nutrinoz.com</p>
                    <p class="phone ape"><img src="images/ca.png"/> 7895183128</p>
                    <p class="s-link">
                </div>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    <div class="contact-mail">
        <div class="div1">
            <div class="error"><p></p></div>
            <form method="post" action="">
                <label>Your Name</label><br>
                <input type="text" class="input-en" name="name" placeholder="Enter name..."><br>
                <span></span><br>
                <label>Your Email</label><br>
                <input type="text" class="input-en" name="email" placeholder="Enter email..."><br>
                <span></span><br>
                <label>Message</label><br>
                <textarea placeholder="Enter message..."></textarea><br>
                <span></span><br>
                <input type="submit" name="submit" class="submit-btn">
            </form>
        </div>
    </div>
    
    
    <div class="findus-section">
        <div class="n14-container content-wrapper">
            <center><p>as seen on</p></center>
            <div class="sec2">
                <div class="col-md-4 col-lg-4 col-sm-4">
                    <a href="#"><img src="images/n14-findus1.png" width="80%" height="70px"/></a>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4">
                    <a href="#"><img src="images/n14-findus2.png" width="80%" height="70px"/></a>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4">
                    <a href="#"><img src="images/n14-findus3.png" width="80%" height="70px"/></a>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    
    
    

<?php include ('includes/footer.php'); ?>
<script>
function initMap() {
        var uluru = {lat: 29.854, lng: 77.888};
        var map = new google.maps.Map(document.getElementById('google-map'), {
          zoom: 14,
          center: uluru,
        scrollwheel: false
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwN-9DJuDRragvIp22Du4iOsw7TNTpbJU&callback=initMap"></script>

</body>
</html>