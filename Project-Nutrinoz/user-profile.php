<?php 
require('includes/Dbconfig.php');
include('includes/session.php');
if(@!$_SESSION['user_id']){
	header("Location:join-us.php");
}
$user_id = $_SESSION['user_id'];
$check_id = mysqli_query($con, "SELECT * FROM nutrinoz_users_info WHERE info_user_id = '$user_id'");
$info = mysqli_fetch_array($check_id);
$error = false;
if(isset($_POST['snext_submit'])){
	if(@!$_POST['terms']=="agreed"){
		$error = true;
		$checkbox_error = "Please click on checkbox to submit information";
	}
	else{
		$weight = mysqli_real_escape_string($con, $_POST['weight']);
	    $height = mysqli_real_escape_string($con, $_POST['height']);
	    $age = mysqli_real_escape_string($con, $_POST['age']);
	    $tweight = mysqli_real_escape_string($con, $_POST['tweight']);
	    $allergy1 = mysqli_real_escape_string($con, $_POST['allergy1']);
	    $allergy2 = mysqli_real_escape_string($con, $_POST['allergy2']);
	    $gender = mysqli_real_escape_string($con, $_POST['gender']);
	    $nonveg = mysqli_real_escape_string($con, $_POST['non-veg']);
	    $everyday = mysqli_real_escape_string($con, $_POST['everyday']);
	    $phy_activity = mysqli_real_escape_string($con, $_POST['phy-actvity']);
		
		if(!preg_match("/^[12][0-9]{2}$/", $height)){
		$error = true;
		$height_error = "Invalid height";
	    }
		else if($height <120 ){
			$error = true;
			$height_error = "Min 120cm required to get dietplan";
		}
		else if( $height > 300){
			$error = true;
			$height_error = "It's Look like you are out of range";
		}
		
		if(!preg_match("/^[1-6]{2}$/", $age)){
			$error = true;
			$age_error = "Min 14 and max 69 years age limit";
		}
		else if($age < 14){
			$error = true;
			$age_error = "Min 14 and max 69 years age limit";
		}
		
		if(!empty($tweight) & !preg_match("/^[1-9][0-9]{1,2}$/", $tweight)){
			$error = true;
			$tweight_error = "Invalid target weight";
		}
		else if(!empty($tweight) & $tweight < 40){
			$error = true;
			$tweight_error = "target weight too low";
		}
		else if(!empty($tweight) & $tweight > 500){
			$error = true;
			$tweight_error = "Invalid target weight";
		}
		
		if(!preg_match("/^[1-9][0-9]{1,2}$/", $weight)){
			$error = true;
			$weight_error = "Invalid weight";
		}
		else if($weight < 40){
			$error = true;
			$weight_error = "weight too low";
		}
		else if($weight > 500){
			$error = true;
			$weight_error = "Invalid weight";
		}
		if(empty($allergy1)){
			$allergy1 = "None";
		}
		if(empty($allergy2)){
			$allergy2 = "None";
		}
		if(empty($tweight)){
			$tweight = $weight;
		}
		
		$bmi = @round(($weight*10000)/($height*$height), 2);
		$bmr = 0;
	    if($gender == 'Male'){
		    $bmr = 66 + (13.7 * $weight ) + (5 * $height ) - (6.8 * $age );
	    }else if($gender == 'Female' ){
		    $bmr = 655 + (9.6 * $weight ) + (1.8 * $height ) - (4.7 * $age );
	    }
	    $cal = 0;
	    if ($phy_activity == 'Sedentary'){
		    $cal = $bmr * 1.2;
	    }else if ($phy_activity == 'Lightly Active') {
		    $cal = $bmr * 1.375;
	    }else if ($phy_activity == 'Moderately Active') {
		    $cal = $bmr * 1.55;
	    }else if ($phy_activity == 'Very Active') {
		    $cal = $bmr * 1.725;
	    }else if ($phy_activity == 'Extra Active') {
		    $cal = $bmr * 1.9;
	    }
		$cal1 = round($cal, 0) - 100;
		$cal2 = round($cal, 0) + 100;
		$calories = $cal1 . ' - ' . $cal2 ;
		$bmi_ideal_weight_range1 = round((18.5 * $height * $height )/10000, 1);
	    $bmi_ideal_weight_range2 = round((25 * $height * $height )/10000, 1);
		$ideal_weight = $bmi_ideal_weight_range1 .' - '. $bmi_ideal_weight_range2;
		
		if(!$error){
			if(!mysqli_num_rows($check_id) > 0){
				$query = "INSERT INTO nutrinoz_users_info (info_user_id, user_weight, user_height, user_age, user_tar_weight, user_phy_activity, user_everyday, user_gender, user_veg_type, user_allergy1, user_allergy2, user_bmi, user_ideal_weight, user_calories) VALUES ('$user_id', '$weight', '$height', '$age', '$tweight', '$phy_activity', '$everyday', '$gender', '$nonveg', '$allergy1','$allergy2', '$bmi', '$ideal_weight', '$calories')";
                $result = mysqli_query($con, $query);
				if($result){
					$smsg = "<span style='color:green;font-size:12px;'>Your info successfully inserted</span>";
					header('location:user-profile.php?msg=Your info successfully inserted');
					
				}
				else{
					$smsg = "Some error occured1";
				}
			}
			else{
				$query = "UPDATE nutrinoz_users_info SET info_user_id='$user_id', user_weight='$weight', user_height='$height', user_age='$age', user_tar_weight='$tweight', user_phy_activity='$phy_activity', user_everyday='$everyday', user_gender='$gender', user_veg_type='$nonveg', user_allergy1='$allergy1', user_allergy2='$allergy2', user_bmi='$bmi', user_ideal_weight='$ideal_weight', user_calories='$calories' WHERE info_user_id = '$user_id'";
			    $result = mysqli_query($con, $query);
				if($result){
					$smsg = "<span style='color:green;font-size:12px;'>Your info successfully updated</span>";
					header('location:user-profile.php?msg=Your info successfully updated');
				}
				else{
					$smsg = "Some error occured";
				}
			}
		}
	}
	
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutrinoz - Join Us</title>
    <link rel="icon" href="images/icon-logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
	<link href="css/joinus.css" rel='stylesheet' type='text/css'/>
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

    <?php include('includes/header.php'); ?>
    
	<div class="joinus-section">
	    <div class="join-content">
		    <div class="sign-se-ti">Please fill all the information so that we can prepare a diet plan for you</div>
            <div class="outer-div">
                <div class="col-md-5">
                    <div class="sec1" style="padding-top:60px;">
                        <img src="images/n2-green-box-dish.png" style="max-width:100%;"/>
                    </div>
                </div>
                <div class="col-md-7 form-div">
                    <div class="sec2 sec2-signup">
                        <div class="div2">
                            <span class="error" style='color:green;font-size:12px;' ><?php echo @$_GET['msg']; ?></span>
                            <div class="signup-form">
                                <form method="post" action="user-profile.php" id="signup_next_step">
                                    <div class="col-md-6">
                                        <span class="error up_error"><?php echo @$weight_error; ?></span><br>
                                        <input class="weight" type="text" name="weight" placeholder="Weight(KG)" id="weight" value="<?php echo @$info['user_weight']; ?>"/><br>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="error up_error"><?php echo @$height_error; ?></span><br>
                                        <input class="height" type="text" name="height" placeholder="Height(CM)" id="height" value="<?php echo @$info['user_height']; ?>"/><br>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="error up_error"><?php echo @$age_error; ?></span><br>
                                        <input class="ahe" type="text" name="age" placeholder="Age" id="age" value="<?php echo @$info['user_age']; ?>"/><br>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="error up_error"><?php echo @$tweight_error; ?></span><br>
                                        <input class="tweight" type="text" name="tweight" placeholder="Target Weight(KG)" id="tweight" value="<?php echo @$info['user_tar_weight']; ?>"/><br>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="error up_error"><?php echo @$mobile_error; ?></span><br>
                                        <input class="allergy" type="text" name="allergy1" placeholder="Allergens or Disease" id="allergy" value="<?php echo @$info['user_allergy1']; ?>"/><br>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="error up_error"><?php echo @$mobile_error; ?></span><br>
                                        <input class="allergy" type="text" name="allergy2" placeholder="Allergy or Any Disease" id="allergy" value="<?php echo @$info['user_allergy2']; ?>"/><br>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="everyday" class="everyday">
                                              <option value="Mostly at home" <?php echo ($info['user_everyday'] == "Mostly at home")?"selected":"" ?>>Mostly at home</option>
                                              <option value="Mostly at office" <?php echo ($info['user_everyday'] == "Mostly at office")?"selected":"" ?>>Mostly at office</option>
                                              <option value="Most of day on foot" <?php echo ($info['user_everyday'] == "Most of day on foot")?"selected":"" ?>>Most of day on foot</option>
                                              <option value="Manual Labor" <?php echo ($info['user_everyday'] == "Manual Labor")?"selected":"" ?>>Manual Labor</option>
                                              <option value="Not Specified" <?php echo ($info['user_everyday'] == "Not Specified")?"selected":"" ?>>Other</option>
                                         </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="phy-actvity" class="phy-activity">
                                             <option value="Sedentary" <?php echo ($info['user_phy_activity'] == "Sedentary")?"selected":"" ?>>Little or no exercise</option>
                                             <option value="Lightlt Active" <?php echo ($info['user_phy_activity'] == "Lightlt Active")?"selected":"" ?>>Lightlt Active - exercise/sports 1-3 times/week</option>
                                             <option value="Moderately Active" <?php echo ($info['user_phy_activity'] == "Moderately Active")?"selected":"" ?>>Moderately Active - exercise/sports 14-5 times/week </option>
                                             <option value="Very Active" <?php echo ($info['user_phy_activity'] == "Very Active")?"selected":"" ?>>Very Active - exercise/sports 6-7 times/week</option>
                                             <option value="Extra Active" <?php echo ($info['user_phy_activity'] == "Extra Active")?"selected":"" ?>>Extra Active - very hard exercise/sports and Physical job</option>
                                         </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="non-veg" class="s_non-veg">
                                              <option value="Vegetarian"  <?php echo ($info['user_veg_type'] == "Vegetarian")?"selected":"" ?>>Vegetarian</option>
                                              <option value="Non-Vegetarian"  <?php echo ($info['user_veg_type'] == "Non-Vegetarian")?"selected":"" ?>>Non-Vegetarian</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="gender" class="s_gender">
                                              <option value="Male"  <?php echo ($info['user_gender'] == "Male")?"selected":"" ?>>Male</option>
                                              <option value="Female"  <?php echo ($info['user_gender'] == "Female")?"selected":"" ?>>Female</option>
                                         </select>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="error"  style="margin-top:20px;"><?php echo @$checkbox_error; ?></span><br>
                                         <input type="checkbox" name="terms" id="terms" value="agreed" checked/><span class="policy"> I agree to check with my physician before using this nutritional plan</span><br>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="submit" name="snext_submit" class="signup_next" id="login_submit" value="SUBMIT"/>
                                    </div>
                                    <div class="clear-crowd"></div>
                                </form>
                            <div class="clear-crowd"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
		</div>
    </div>	
</body>
</html>