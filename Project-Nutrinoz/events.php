<?php include('includes/session.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu - Nutronoz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
            <p class="n1-title n-m-title">events</p>
            <p class="n1-subtitle n-m-subtitle">See Our Latest Events</p>
            <hr style="border-top:2px solid #57b63a;width:20%;" align="left"/>
        </div>
    </div>
    <a href="#event-page" class="u-arrow-link"><div class="arrow-link"><img src="images/down-arrow.png" width="20px" height="20px"/></div></a>
    
    <div class="p-n2-menu" id="event-page">
        <div class="p-n2-content p-n-m-content">
            <p class="n2-title n-m-title">featured events</p>
            <hr style="border-top:2px solid #e8e8e8;width:100%;" align="left"/>
            <div class="sec2">
                <div class="col-md-4 col-sm-4">
                    <div class="n11-event event1">
                        <a href="#" class="event-link">
                            <div class="upper"><p>see event</p></div>
                            <div class="bottom">
                                <p>Special Catering Day</p>
                                <hr class="hr" align="left"/>
                                <h5>Mar27, 2017 9:00PM</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="n11-event event2">
                        <a href="#" class="event-link">
                            <div class="upper"><p>see event</p></div>
                            <div class="bottom">
                                <p>Wedding Event</p>
                                <hr class="hr" align="left"/>
                                <h5>Mar20, 2017 9:00PM</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="n11-event event3">
                       <a href="#" class="event-link">
                            <div class="upper"><p>see event</p></div>
                            <div class="bottom">
                                <p>Super Bowl Event</p>
                                <hr class="hr" align="left"/>
                                <h5>Mar13, 2017 9:00PM</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    
     <?php include ('includes/footer.php'); ?>
<script type="text/javascript" src="js/script.js"></script>  
</body>
</html>