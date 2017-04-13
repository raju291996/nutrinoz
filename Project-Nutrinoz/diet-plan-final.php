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
	
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diet Plan - Nutronoz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    <script type="text/javascript">WebFont.load({
       google: {
         families: ["Montserrat:400,700","Unna:regular","Source Sans Pro:regular,italic,700","Raleway:300,regular,500,600,700,800,900","Libre Baskerville:regular,italic,700"]
       } });
    </script>
</head>
<body>
    <?php include ('includes/header.php'); ?>
    
	<div class="container-fluid">
	    <div class="n1-d-f-content">
            <div class="plan">
                <h1>Your Personalized 30 Days <br>Diet Plan is Ready</h1>
                <a href="#" class="btn btn-primary">Get It Now</a>
            </div>
        </div>
	</div>
    <div class="bmi-section">
        <div class="bmi">
            <h3 class="title">BMI</h3>
            <hr style="border-top:3px solid #666;width:10%;margin-bottom:20px;" align="center"/>
            <div class="col-md-3 div-b">
                <h5>Your BMI</h5>
                <span class="div1"><b><?php echo $bmi; ?> kg/m<sup>2</sup></b></span>
            </div>
            <div class="col-md-6">
                <h5>Standard BMI Table for Adults</h5>
                <div class="table-responsive bmi-stnd">
                <table class="table table-bordered ">
	                <thead><tr><th>Category</th><th>BMI Range - kg/m<sup>2</sup></th></tr></thead>
                    <tr><td>Severe UnderWeight</td><td> &lt; 16</td></tr>
                    <tr><td>Moderate Underweight</td><td>16 - 17</td></tr>
                    <tr><td>Mild Underweight</td><td>17 - 18.5</td></tr>
                    <tr><td>Normal Weight</td><td>18.5 - 25</td></tr>
                    <tr><td>Overweight</td><td>25 - 30</td></tr>
                    <tr><td>Obesity class 1</td><td>30 - 35</td></tr>
                    <tr><td>Obesity class 2</td><td>35 - 40</td></tr>
                    <tr><td>Obesity class 3</td><td> &gt; 40</td></tr>
                </table>
            </div>
            </div>
            <div class="col-md-3">
                <h5> Suggestion</h5>
                <span class="div3">Your BMI is within the norm. Please calculate your BMI regularly and consult your physician when it is lower and upper the norm.</span>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    <div class="calorie-section">
        <div class="calorie">
            <h3 class="title">CALORIES</h3>
            <hr style="border-top:3px solid #666;width:10%;margin-bottom:20px;" align="center"/>
            <div class="col-md-3 div-c">
                <h5>Recommend Calories Range</h5>
                <span class="div1"><b><?php echo round($cal, 0)-100; ?> - <?php echo round($cal, 0)+100; ?> kCal</b></span>
                
            </div>
            <div class="col-md-6">
                <h5>Result</h5>
                <div class="cal-result">
                     <p>You have a BMR of <?php echo round($bmr, 0); ?>.</p>
                     <p>You need <?php echo round($cal, 0); ?> Calories/day to maintain your weight.</p>
                     <p>You need <?php echo round($cal, 0)+500; ?> Calories/day to gain 0.5 kg per week.</p>
                     <p>You need <?php echo round($cal, 0)+1000; ?> Calories/day to gain 1 kg per week.</p>
                     <p>You need <?php echo round($cal, 0)-500; ?> Calories/day to lose 0.5 kg per week.</p>
                     <p>You need <?php echo round($cal, 0)-1000; ?> Calories/day to lose 1 kg per week.</p>
                </div>
            </div>
            <div class="col-md-3">
                <h5>Suggestion</h5>
                <span class="div3">Try not to lower your calorie intake by more than 1,000 calories per day, and try to lower your calorie intake gradually, but not more than 1000 below your maintenance level.</span>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    <div class="idwt-section">
        <div class="idwght">
            <h3 class="title">IDEAL WEIGHT</h3>
            <hr style="border-top:3px solid #666;width:10%;margin-bottom:20px;" align="center"/>
            <div class="col-md-3 div-i">
                <h5>Recommend Ideal Weight Range</h5>
                <p class="div1"><b><?php echo $bmi_ideal_weight_range1; ?> kgs - <?php echo $bmi_ideal_weight_range2; ?> kgs</b></p>
            </div>
            <div class="col-md-6">
                <h5>Result</h5>
                <div class="iw-result">
                     <p>Based on the Robinson formula your ideal weight is <?php echo $rob_ideal_weight; ?> kgs</p>
                     <p>Based on the Miller formula your ideal weight is <?php echo $mil_ideal_weight; ?> kgs</p>
                     <p>Based on the Devine formula your ideal weight is <?php echo $dev_ideal_weight; ?> kgs</p>
                     <p>Based on the Hamwi formula your ideal weight is <?php echo $ham_ideal_weight; ?> kgs</p>
                </div>
            </div>
            <div class="col-md-3">
                <h5>Suggestion</h5>
                <span class="div3">This is the weight that other people of the same height and at the same age consider perfect.</span>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
	<?php include ('includes/footer.php') ?>
</body>
</html>








