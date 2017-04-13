<?php include('includes/session.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu - Nutronoz</title>
    <link rel="icon" href="images/icon-logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <p class="n1-title n-m-title">menu</p>
            <p class="n1-subtitle n-m-subtitle">Menu Dishes</p>
            <hr style="border-top:2px solid #57b63a;width:20%;" align="left"/>
        </div>
    </div>
    <div class="p-n2-menu" id="menu-page">
        <div class="p-n2-content p-n-m-content">
            <p class="n2-title n-m-title">our menu</p>
            <hr style="border-top:2px solid #e8e8e8;width:100%;overflow-x:hidden;" align="left"/>
            <div class="menu-list">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="outer-div">
                        <a href="category.php?menu=breakfast"><div class="inner-div breakfast"><span class="s1">Breakfast</span></div><div class="s2">see menu</div></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="outer-div">
                        <a href="category.php?menu=lunch"><div class="inner-div lunch"><span class="s1">Lunch</span></div><div class="s2">see menu</div></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="outer-div">
                        <a href="category.php?menu=dinner"><div class="inner-div dinner"><span class="s1">Dinner</span></div><div class="s2">see menu</div></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="outer-div">
                        <a href="category.php?menu=dessert"><div class="inner-div dessert"><span class="s1">Dessert</span></div><div class="s2">see menu</div></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="outer-div">
                        <a href="category.php?menu=beverage"><div class="inner-div beverage"><span class="s1">Beverage</span></div><div class="s2">see menu</div></a>
                    </div>
                </div>
                
                
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    
     <?php include ('includes/footer.php'); ?>
<script type="text/javascript" src="js/script.js"></script>  
</body>
</html>