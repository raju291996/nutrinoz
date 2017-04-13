<?php 
require('includes/Dbconfig.php');
include('includes/session.php');
if(@!$_SESSION['user_id']){
	header("Location:login.php");
}
$user_id = $_SESSION['user_id'];
$check_id = mysqli_query($con, "SELECT * FROM nutrinoz_users_info INNER JOIN nutrinoz_users ON nutrinoz_users_info.info_user_id = nutrinoz_users.user_id WHERE info_user_id = '$user_id'");
$info = mysqli_fetch_array($check_id);
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nutronoz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/joinus.css" rel="stylesheet" type="text/css"/>
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
    
    <div class="profile-section1 ps1">
        <div class="user1">
            <h1>hii! <span><?php echo @$info['user_name'] ?></span></h1>
            <p>Want to eat healthy, Don't worry, we will take care of it</p>
            <a href="#"><img src="images/p-right-arrow.png" width="20px" height="20px"/>order now</a>
        </div>
    </div>
    
    
    
    <div class="profile-section3 ps3">
        <div class="data-all">
            <div class="outer-div">
                <div class="col-md-4 col-sm-4">
                    <h3>BMI</h3>
                    <div id="f-circle"><strong class="circle-strong1"><?php echo @$info['user_bmi']; ?><br>kg/m<sup>2</sup></strong></div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h3>Calories</h3>
                    <div id="s-circle"><strong class="circle-strong2"><?php echo @$info['user_calories']; ?> <br><span class="center1">kCal</span></strong></div>
                </div>
                <div class="col-md-4">
                    <h3>Ideal Weight</h3>
                    <div id="t-circle"><strong class="circle-strong3"><?php echo @$info['user_ideal_weight']; ?> <br><span class="center2">Kg</span></strong></div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    
    <div class="profile-section4 ps4">
        <div class="outer-div">
            <div class="part1">
                <h1>Our Recommended Diet Plan</h1>
            </div>
            <div class="part2">
                <div class="col-sm-4 col-md-4">
                    <div class="inner-div">
                        <div class="title"><h3>Diet Plan 1</h3></div>
                        <div class="desc"><img src="images/ps45.jpeg"/></div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="inner-div">
                        <div class="title"><h3>Diet Plan 2</h3></div>
                        <div class="desc"><img src="images/ps44.jpeg"/></div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="inner-div">
                        <div class="title"><h3>Diet Plan 3</h3></div>
                        <div class="desc"><img src="images/ps46.jpg"/></div>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
	
	<div class="profile-section2 ps2">
        <div class="inner-div1">
            <div class="col-md-4">
                <div class="info1">
                    <h3>Your information</h3>
                    <p><span class="span1">Name :</span> <?php echo @$info['user_name'] ?></p>
                    <p><span class="span1">Email :</span> <span><?php echo @$info['user_email'] ?></span></p>
                    <p><span class="span1">Phone :</span> <span><?php echo @$info['user_contact'] ?></span></p>
                    <p><span class="span1">Gender :</span> <span><?php echo @$info['user_gender']; ?></span></p>
                    <p><span class="span1">Activities :</span> <span><?php echo @$info['user_phy_activity']; ?></span></p>
                    <p><span class="span1">Everday :</span> <span><?php echo @$info['user_everyday']; ?></span></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="img">
                    <img src="images/profilepic.jpg"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info2">
                    <h3>Your information</h3>
                    <p><span class="span1">Age :</span> <span><?php echo @$info['user_age']; ?> Years</span></p>
                    <p><span class="span1">Weight :</span> <span><?php echo @$info['user_weight']; ?> KG</span></p>
                    <p><span class="span1">Target :</span> <span><?php echo @$info['user_tar_weight']; ?> KG</span></p>
                    <p><span class="span1">Height :</span> <span><?php echo @$info['user_height']; ?> CM</span></p>
                    <p><span class="span1">Veg/Non-veg :</span> <span><?php echo @$info['user_veg_type']; ?></span></p>
                    <p><span class="span1">Allergy :</span> <span><?php echo @$info['user_allergy1']. ', '.@$info['user_allergy2']; ?></span></p>
                </div>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
  <div class="profile-set"><a href="#" class="pro-set"><img src="images/pro-settings-work-tool.png" width="20px" height="20px"></a></div>
   <?php 
   $calX = explode(' - ', $info['user_calories']);
   $calT = ($calX[0]+$calX[1])/2;
   $wegX = explode(' - ', $info['user_ideal_weight']);
   echo $wegT = ($wegX[0]+$wegX[1])/2;
   ?>
    
    
<script src="js/circle-progress.js"></script>
<script>
  $('#f-circle').circleProgress({
    value: <?php echo round($info['user_bmi']/40, 2);?>,
   size: 200, 
   startAngle: 3.14 *3/2,
   thickness: 20,
  });
    $('#s-circle').circleProgress({
    value: <?php echo $calT/4000; ?>,
   size: 200, 
   startAngle: 3.14 *3/2,
   thickness: 20,
  });
  $('#t-circle').circleProgress({
    value: <?php echo $wegT/200; ?>,
   size: 200, 
   startAngle: 3.14 *3/2,
   thickness: 20,
  });
</script>
</body>
</html>