<?php 
require('includes/Dbconfig.php');
include('includes/session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nutrinoz Restaurant</title>
    <link rel="icon" href="images/icon-logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link href="css/main.css" rel='stylesheet' type='text/css'/>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    <script type="text/javascript">WebFont.load({
       google: {
         families: ["Montserrat:400,700","Unna:regular","Source Sans Pro:regular,italic,700","Raleway:300,regular,500,600,700,800,900","Libre Baskerville:regular,italic,700"]
       } });
    </script>
</head>
<body>

    <div class="header-section nv">
        <div class="mob-div">
            <div class="m-inner-div">
                <div class="left">
                     <li><a href="#" onclick="openNav()"><img src="images/menu-bar.png"/></a></li>
                     <li><a href="#"><img src="images/icon-logo.png" width="32px" height="32px"/></a></li>
                </div>
                <div class="right">
                    <li><a href="#">join us</a></li>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
        <div class="outer-div">
            <div class="inner-div">
                <div class="n-brand">
                    <div class="n-logo">
                        <a href="index.php"><img src="images/logo_new_icon.png" class="nv-logo" alt="Nutrinoz-logo"/></a>
                    </div>
                </div>
                <div class="n-menu">
                    <div class="n-nav" id="mySidenav">
                        <ul>
                            <li><img src="images/logo_new_icon.png" class="sm-logo"></li>
                            <li><a href="menu.php">menu</a></li>
                            <li><a href="diet-plan.php">diet plan</a></li>
                            <li><a href="#">order</a></li>
                            <li><a href="#">blog</a></li>
                            <li><a href="visit-us.php">visit us</a></li>
                            <li><a href="join-us.php" class="ext-join">join us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    <div class="welcome-section">
        <div class="content-wrapper-n2">
            <div class="hero-section">
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 n2-xs-6">
                    <div class="welcome-dish-container">
                        <div class="green-bg-box">
                            <img src="images/n2-green-box-dish.png" alt="Image"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 n2-xs-6">
                    <div class="welcome-text-container">
                        <span>welcome to</span>
                        <h2>Nutrinoz
                            Restaurant
                        </h2>
                        <div class="green-line"></div>
                        <p class="intro-para">Lorem is an Elegant yet verylorem ipsum dolar. Made up of several useful sections that you can edit or remove.</p>
                        <a href="#">Order now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="about-section">
        <div class="content-wrapper-n3">
                <div class="col-md-7 col-sm-6">
                    <div class="mini-title">about us</div>
                    <h2 class="h2-heading">Dedicated To Nourish You</h2>
                    <div class="n3-line"></div>
                    <p class="intro-para">Aenean tellus urna, vehicula quis quam vel, finibus sollicitudin quam maecenas mollis risus eu purus faibus efficitur.</p>
                    <p class="sec-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. </p>
                    <img src="images/nutinoz-signature.png" width="140px" height="100px"/>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="grey-circle"></div>
                </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
    <div class="location-section">
        <div class="content-wrapper n3-container">
            <div class="col-md-6 col-sm-6 col-xs-6 loc-col1">
                <div class="loc-img">
                    <img src="images/n4-location.jpeg" height="320px"/>
                </div>
                <div class="loc-name">
                    <div class="lc1 lc11">&</div>
                    <div class="lc1 lc12">
                        <h5>locate us</h5>
                        <p>Roorkee, Haridwar, Uttrakhand</p>
                    </div>
                    <div class="clear-crowd"></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 loc-col2">
                <div class="mini-title">our location</div>
                <h2 class="h2-heading">Close To Downtown</h2>
                <div class="n4-line"></div>
                <p class="intro-para">Etiam tristique, metus pretium rutrum elementum, risus tortor euismod urna, ac porta felis felis vel dui in bibendum justo vel pellentesque accumsan. </p>
                <a href="#">learn more</a>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
    <div class="test-section">
        <div class="n5-container">
            <div class="test-image respo-img"><img src="images/n5-testimonials.jpg" height="550px"></div>
            <div class="test-respo respo-img">
                <div class="mini-title">testimonials</div>
                <h2>Best Rated<br>
                Restaurant for<br>
                Nutrition</h2>
                <div class="n5-line"></div>
                <p class="intro-para">Aenean tellus urna, vehicula quis quam vel, finibus sollicitudin quam maecenas mollis risus eu purus faibus efficitur.</p>
                <p class="sec-para">The fantastic dishes, the restaurant itself, the friendly and attentive staff and of course the marvelous Chef de Cusine made our stay in Nice unforgettable.</p>
                <p class="user-para"><span>Ritik Shah, Roorkee</span> <img src="images/n5-starrate.png" width="90px" height="16px"/></p>
                <a href="#">visit us</a>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
    <div class="menu-section">
        <div class="content-wrapper n6-container">
            <div class="col-md-6 col-sm-6 col-xs-6 menu-col1">
                <div class="menu-sub-col">
                    <div class="mini-title">menu</div>
                    <h2 class="h2-heading">Delicious<br><span>Dishes</span></h2>
                    <p class="intro-para">Etiam tristique, metus pretium rutrum elementum, risus tortor euismod urna, ac porta felis felis vel dui in bibendum justo vel pellentesque accumsan.</p>
                    <a href="#">see menu</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 menu-col2"><img src="images/n6-menu.png"></div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
    <div class="ing-section">
        <div class="n9-container content-wrapper">
            <div class="sec1">
                <div class="mini-title">ingradients</div>
                <h2 class="h2-heading">Supreme Quality Ingredients</h2>
                <hr class="hr" align="center">
                <p class="intro-para">Etiam tristique, metus pretium rutrum elementum, risus tortor euismod urna, ac porta felis felis vel dui in bibendum justo vel pellentesque accumsan.</p>
            </div>
            <div class="sec2">
                <div class="col-md-4 col-sm-4">
                    <div><img src="images/n9-ing-1.png" width="230px" height="230px"/></div>
                    <div class="mini-title">special</div>
                    <h2 class="h2-heading">Delicious<br>Herbs</h2>
                    <p class="intro-para">Etiam tristique, metus pretium rutrum elementum, risus tortor euismod urna, ac porta felis felis vel dui.</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div><img src="images/n9-ing2.png"  width="230px" height="230px"/></div>
                    <div class="mini-title">market</div>
                    <h2 class="h2-heading">Fresh<br>Products</h2>
                    <p class="intro-para">Etiam tristique, metus pretium rutrum elementum, risus tortor euismod urna, ac porta felis felis vel dui.</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div><img src="images/n9-ing3.png" width="230px" height="230px"/></div>
                    <div class="mini-title">selected</div>
                    <h2 class="h2-heading">Organic<br>Ingradients</h2>
                    <p class="intro-para">Etiam tristique, metus pretium rutrum elementum, risus tortor euismod urna, ac porta felis felis vel dui.</p>
                </div>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
      <div class="recommend-section">
        <div class="n10-container content-wrapper">
            <div class="sec1">
                <div class="mini-title">we recommends</div>
                <h2 class="h2-heading">Try Our Specialities</h2>
                <hr class="hr" align="center">
                <p class="intro-para">Etiam tristique, metus pretium rutrum elementum, risus tortor euismod urna, ac porta felis felis vel dui in bibendum justo vel pellentesque accumsan.</p>
            </div>
            <div class="sec2">
                <div class="col-md-4 col-sm-4 col-xs-6 n10-recomend">
                    <div class=" n10-recepie">
                        <img src="images/n10-recomend1.jpeg"  alt="Image"/>
                        <h2 class="h2-heading">Vanilla Pot de Almonds Creme</h2>
                        <div style="text-align:left;margin-left:20px;"><span class="dish-type">SPICY</span></div>
                        <p class="intro-para">Crispy and crunchy on the outside and juicy on the inside, that’s how I would describe this awesome dish. The wings were simply seasoned with grated ginger, salt and pepper and then rolled in potato starch.</p>
                        <div class="cal">Calories: 478 <span class="dash">|</span> Rs: 120/-</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 n10-recomend">
                    <div class=" n10-recepie">
                        <img src="images/n10-recomend2.jpeg" alt="Image"/>
                        <h2 class="h2-heading">Iced Tea With Fresh Red Berries</h2>
                        <div style="text-align:left;margin-left:20px;"><span class="dish-type">KOSHER</span></div>
                        <p class="intro-para">Crispy and crunchy on the outside and juicy on the inside, that’s how I would describe this awesome dish. The wings were simply seasoned with grated ginger, salt and pepper and then rolled in potato starch.</p>
                        <div class="cal">Calories: 450 <span class="dash">|</span> Rs: 50/-</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 n10-recomend">
                    <div class=" n10-recepie">
                        <img src="images/n10-recomend3.jpeg"  alt="Image"/>
                        <h2 class="h2-heading">Trio of Seasoned Deviled Eggs</h2>
                        <div style="text-align:left;margin-left:20px;"><span class="dish-type">SPICY</span><span class="dish-type">KOSHER</span><span class="dish-type">VEGAN</span></div>
                        <p class="intro-para">Crispy and crunchy on the outside and juicy on the inside, that’s how I would describe this awesome dish. The wings were simply seasoned with grated ginger, salt and pepper and then rolled in potato starch.</p>
                        <div class="cal">Calories: 300 <span class="dash">|</span> Rs: 35/-</div>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
    <div class="findus-section">
        <div class="n14-container content-wrapper">
            <center><p>as seen on</p></center>
            <div class="sec2">
                <div class="col-md-4 col-sm-4 col-xs-4 n14-find">
                    <a href="#"><img src="images/n14-findus11.png" width="80%" height="70px"/></a>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 n14-find">
                    <a href="#"><img src="images/n14-findus21.png" width="80%" height="70px"/></a>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 n14-find">
                    <a href="#"><img src="images/n14-findus31.png" width="80%" height="70px"/></a>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    
    <div class="footer-section">
        <div class="n15-container content-wrapper">
            <div class="sec2">
                <div class="col-md-3 col-sm-3 col-xs-3 n15-logo">
                    <div class="f-content">
                        <img src="images/nutrinoz_logo.png" width="150px" height="80px" style="margin-top:60px;">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 n15-sm-4 n15-time">
                    <div class="f-content">
                        <div class="mini-title">open hours</div>
                        <p class="time">Mon....6am-10am<br>Tue....6am-10am<br>Wed....6am-10am<br>Thurs....6am-10am<br>Fri.....6am-12am<br>Sat.....6am-12am<br>Sun....6am-12am</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 n15-sm-4 n15-social">
                    <div class="f-content">
                        <div class="mini-title">contact us</div>
                        <p class="address ape"><img src="images/loc.png"/> Roorkee, Haridwar<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Uttrakhand, 247667</p>
                        <p class="email ape"><img src="images/em.png" /> care@nutrinoz.com</p>
                        <p class="phone ape"><img src="images/ca.png"/>(+91) 7895183128</p>
                        <p class="s-link">
                            <a href="#"><img src="images/fb.png" width="24px" height="24px"/></a>
                            <a href="#"><img src="images/insta.png"  width="24px" height="24px"/></a>
                            <a href="#"><img src="images/li.png" width="24px" height="24px"/></a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 n15-sm-4 n15-and">
                    <div class="f-content">
                        <div class="mini-title">find us</div>
                        <a href="#"><img src="images/google-play.png" width="180px" height="80px"/></a>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
        <center><div class="copyright">© 2017 nutrinoz.com - All Rights Reserved.</div></center>
    </div>
    
<script>
function openNav() {
    //document.getElementById("mySidenav").style.width = "250px";
    //document.getElementById("main").style.marginLeft = "250px";
    //document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    //document.getElementById("mySidenav").style.width = "0";
    //document.getElementById("main").style.marginLeft= "0";
    //document.body.style.backgroundColor = "white";
}
</script>
    
</body>
</html>
    