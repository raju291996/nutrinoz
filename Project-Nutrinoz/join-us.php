<?php 
require('includes/Dbconfig.php');
include ('includes/session.php');
if(@$_SESSION['user_id']){
	header("Location:user-profile.php");
}
$error = false;
date_default_timezone_set('Asia/Kolkata');
$date= date('Y-m-d H:i:s') ;
if(isset($_POST['signup_submit'])){
	
	if(@!$_POST['terms']=="agreed"){
		$error = true;
		$checkbox_error = "Please click on checkbox to submit information";
	}
	else{
	
	$fullname = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$mobile = mysqli_real_escape_string($con, $_POST['contact']);
	$hash = password_hash($password, PASSWORD_BCRYPT);
	$confirm_code=md5(uniqid(rand())); 
	
	//basic name validation
	if(strlen($fullname) < 3){
		$error = true;
		$name_error = "At least 3 char required";
	}
	else if(!preg_match("/^[a-zA-Z ]+$/",$fullname)){
		$error = true;
        $name_error = "only alphabets and space";
	}
	
	//email validation
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = true;
		$email_error = "Invalid email";
	}
	else{
		//check if email already exist
		$query = "select user_email from nutrinoz_users where user_email='$email'";
		$run = mysqli_query($con, $query);
		$result = mysqli_num_rows($run);
		if($result!=0){
			$error = true;
			$email_error = "email already exist";
		}
	}
	
	//password validation
	if(strlen($password) < 8) {
        $error = true;
        $password_error = "Atleast 8 characters";
    }
	
	
	//mobile no validation
	if(strlen($mobile) != 10){
		$error = true;
		$mobile_error = "Invalid Mobile No";
	}else if(!preg_match("/^[789][0-9]{9}$/", $mobile)){
		$error = true;
		$mobile_error = "Invalid Mobile No";
	}
	
	if(!$error){
	$query = "INSERT INTO nutrinoz_users (user_name, user_email, user_password, user_contact, user_signup_date, user_last_login, user_act_code, token) VALUES ('$fullname', '$email', '$hash', '$mobile', '$date', '$date', '$confirm_code', '')";
    $result = mysqli_query($con, $query);
    if(!$result){
        $un_exp =  "please try again";
    }
    else{
		$to = $email;  // send e-mail to ...
		$subject = "Email confirmation - Nutrinoz Restaurant"; // Your subject
		$header = "From: Nutrinoz care@nutrinoz.com"; // From
		$message = " 
Thanks for signing up!
Your account has been created, you can login after you have activated your account by pressing the url below.
Please click this link to activate your account:\r\n";
        $message .= "www.nutrinoz.com/account-confirm.php?passkey=$confirm_code"; //cofirmation link....
		$sentmail = mail($to, $subject, $message, $header); // send email */
		
	    $user_id = mysqli_insert_id($con);
        //session_start();
		$_SESSION['user_email'] = $email;
		$_SESSION['user_id'] = $user_id;
		
	    header ("location:user-profile.php");
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/jquery.validate.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/additional-methods.js"></script>
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
            <div class="outer-div">
                <div class="col-md-5 col-sm-5">
                    <div class="sec1">
                        <img src="images/n2-green-box-dish.png" style="max-width:100%;"/>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 form-div">
                    <div class="sec2 sec2-signup">
                        <div class="div1">
                            <div class="link">
                                <h2>Join Nutrinoz &<br>Get Nutritional Food</h2>
                            </div>
                        </div>
                        <div class="div2">
                            <span class="error"><?php echo @$un_exp; ?></span>
                            <div class="signup-form">
                                <form method="post" action="" id="signup_first">
                                    <div class="col-md-6  sign-fi-in">
                                        
                                        <input type="text" name="name" id="name" placeholder="Full Name" required/><br>
										<span class="error"><?php echo @$name_error; ?></span><br>
                                    </div>
                                    <div class="col-md-6 sign-fi-in">
                                        
                                        <input type="text" name="email" id="email" placeholder="Email Address" required/><br>
										<span class="error"><?php echo @$email_error; ?></span><br>
                                    </div>
                                    <div class="col-md-6 sign-fi-in">
                                        
                                        <input type="password" name="password" id="password" placeholder="Password" required/><br>
										<span class="error"><?php echo @$password_error; ?></span><br>
                                    </div>
                                    <div class="col-md-6 sign-fi-in">
                                        
                                        <input type="text" name="contact" id="contact" placeholder="Contact" required/><br>
										<span class="error"><?php echo @$mobile_error; ?></span><br>
                                    </div>
                                    <div class="col-md-12">
                                        
                                         <input type="checkbox" name="terms" id="terms" value="agreed" checked/><span class="policy">By signing up,I agree to your terms and conditions</span><br>
                                        <span class="error"  style="margin-top:0px;"><?php echo @$checkbox_error; ?></span><br>
									</div>
                                    <div class="col-md-6">
                                        <input type="submit" name="signup_submit" id="signup_submit" value="SIGN UP"/>
                                    </div>
                                    <div class="col-md-12 login-link"><span>Already have an account? <a href="login.php" class="up-log">Login</a></span></div>
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
<script type="text/javascript" src="js/stepper.js"></script>
</body>
</html>