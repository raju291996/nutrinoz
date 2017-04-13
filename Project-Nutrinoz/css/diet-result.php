<?php
require_once ('includes/Dbconfig.php');
include('includes/session.php');
if(isset($_POST['submit_diet_plan'])){
	$gender = $_POST['gender'];
	$phy_act = $_POST['physical_activity'];
	$age = mysqli_real_escape_string($con, $_POST['age']);
	$weight = mysqli_real_escape_string($con, $_POST['weight']);
	$height = mysqli_real_escape_string($con, $_POST['height']);
	$tar_weight = mysqli_real_escape_string($con, $_POST['target_weight']);
	$meal_num = $_POST['meal_number'];
	$d_life = $_POST['daily_life'];
	
	$bmi = round(($weight*10000)/($height*$height), 2);
	
	$bmr = 0;
	if($gender == 'male'){
		$bmr = 66 + (13.7 * $weight ) + (5 * $height ) - (6.8 * $age );
	}else if($gender == 'female' ){
		$bmr = 655 + (9.6 * $weight ) + (1.8 * $height ) - (4.7 * $age );
	}
	$cal = 0;
	if ($phy_act == 'sedentary'){
		$cal = $bmr * 1.2;
	}else if ($phy_act == 'lightly active') {
		$cal = $bmr * 1.375;
	}else if ($phy_act == 'moderatetely active') {
		$cal = $bmr * 1.55;
	}else if ($phy_act == 'very active') {
		$cal = $bmr * 1.725;
	}else if ($phy_act == 'extra active') {
		$cal = $bmr * 1.9;
	}
    $cal_range1 = round($cal-100, 0);
    $cal_range2 = round($cal+100, 0);
    $cal_range = $cal_range1 . ' - ' . $cal_range2;
	
	$height_in = $height * 0.3937008;
	$height_ft = $height * 0.0328084;
	
	$dev_ideal_weight = 45.5 + 2.3 * ($height_in - 60 );
	
	if ($gender == 'male'){ //all in kg
		$dev_ideal_weight = round(50 + 2.3 * ($height_in - 60 ), 1); //devine formula
		$rob_ideal_weight = round(52 + 1.9 * ($height_in - 60 ), 1); //robinson formula
		$mil_ideal_weight = round(56.2 + 1.41 * ($height_in - 60 ), 1); //The Miller formula
		$ham_ideal_weight = round(48 + 2.7 * ($height_in - 60 ), 1); //The Hamwi formula
	}else if($gender == 'female') {
		$dev_ideal_weight = round(45.5 + 2.3 * ($height_in - 60 ), 1); //devine formula
		$rob_ideal_weight = round(49 + 1.7 * ($height_in - 60 ), 1); //robinson
		$mil_ideal_weight = round(53.1 + 1.36 * ($height_in - 60 ), 1); //The Miller formula
		$ham_ideal_weight = round(45.5 + 2.2 * ($height_in - 60 ), 1); //The Hamwi formula
	}
	
	$bmi_ideal_weight_range1 = round((18.5 * $height * $height )/10000, 1);
	$bmi_ideal_weight_range2 = round((25 * $height * $height )/10000, 1);
	$bmi_ideal_weight_range = $bmi_ideal_weight_range1 . ' - ' . $bmi_ideal_weight_range2;
    $bmi_iw_circle = ($bmi_ideal_weight_range1 + $bmi_ideal_weight_range2)/2;
}
else{
    header('location:diet-plan.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diet Plan - Nutronoz</title>
    <link rel="icon" href="images/icon-logo.png"/>
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
            <h1>result!</h1>
            <p>Want to eat healthy or want to follw your diet plan</p>
            <a href="#"><img src="images/p-right-arrow.png" width="20px" height="20px"/>get monthly package</a>
        </div>
    </div>
    
    
    
    <div class="profile-section3 ps3">
        <div class="data-all">
            <div class="outer-div">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div><h3>BMI</h3></div>
                    <div id="f-circle"><strong class="circle-strong1"><?php echo $bmi; ?><br>kg/m<sup>2</sup></strong></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div><h3>Calories</h3></div>
                    <div id="s-circle"><strong class="circle-strong2"><?php echo $cal_range; ?> <br><span class="center1">kCal</span></strong></div>
                </div>
                <div class="col-md-4 col-xs-4">
                    <div><h3>Ideal Weight</h3></div>
                    <div id="t-circle"><strong class="circle-strong3"><?php echo $bmi_ideal_weight_range; ?> <br><span class="center2">Kg</span></strong></div>
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
                <div class="col-sm-4 col-md-4 col-xs-4">
                    <div class="inner-div">
                        <div class="title"><h3>Diet Plan 1</h3></div>
                        <div class="desc"><img src="images/ps45.jpg"/></div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-4">
                    <div class="inner-div">
                        <div class="title"><h3>Diet Plan 2</h3></div>
                        <div class="desc"><img src="images/ps44.jpeg"/></div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-4">
                    <div class="inner-div">
                        <div class="title"><h3>Diet Plan 3</h3></div>
                        <div class="desc"><img src="images/ps46.jpg"/></div>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    
<script src="js/circle-progress.js"></script>
<script>
  $('#f-circle').circleProgress({
    value: <?php echo round($bmi/40, 2);?>,
   size: 200, 
   startAngle: 3.14 *3/2,
   thickness: 20,
  });
    $('#s-circle').circleProgress({
    value: <?php echo $cal/4000; ?>,
   size: 200, 
   startAngle: 3.14 *3/2,
   thickness: 20,
  });
  $('#t-circle').circleProgress({
    value: <?php echo $bmi_iw_circle/200; ?>,
   size: 200, 
   startAngle: 3.14 *3/2,
   thickness: 20,
  });
</script>
</body>
</html>