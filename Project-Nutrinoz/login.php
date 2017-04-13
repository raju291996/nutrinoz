<?php 
require('includes/Dbconfig.php');
session_start();
if(@$_SESSION['user_id']){
	header("Location:index.php");
}
$error = false;
date_default_timezone_set('Asia/Kolkata');
$date= date('Y-m-d H:i:s') ;

if(isset($_POST['login_submit'])){
	$email = htmlspecialchars(mysqli_real_escape_string($con, $_POST['email']));
    $password = htmlspecialchars(mysqli_real_escape_string($con, $_POST['password']));
	
	if(!empty($email) & !empty($password)){
	    $query = "SELECT * FROM nutrinoz_users WHERE user_email = '$email'";
	    $result = mysqli_query($con, $query);
	    $rows = mysqli_num_rows($result);
	    if($rows > 0){
	        $data = mysqli_fetch_array($result);
	        $verify_pass = $data['user_password'];
			$user_id = $data['user_id'];
			$user_email = $data['user_email'];
	        if(password_verify($password, $verify_pass)){
				$_SESSION['user_email'] = $user_email;
				$_SESSION['user_id'] = $user_id;
				
				$query1 = "UPDATE nutrinoz_users SET user_last_login='$date'";
				mysqli_query($con, $query1);
				
				header("Location:home.php");
		    }
	        else {
		        $login_error = "Invalid Email or Password";
            }
	    }
	    else{
		    $login_error = "Unregistered Email Address";
	    }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutrinoz - Login</title>
    <link rel="icon" href="images/icon-logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
	<link href="css/joinus.css" rel='stylesheet' type='text/css'/>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
                                <h2 style="font-size:36px;">Login Nutrinoz & <br>Get Your Diet Plan</h2>
                            </div>
                        </div>
                        <div class="div2">
                            <span class="error"></span>
                            <div class="signup-form"  style="padding-top:0px;">
                                <form method="post" action="" class="login-input">
								    <span class="error" style="font-size:14px;"><?php echo @$login_error;?></span><br><br>
                                    <input type="text" name="email" id="email" placeholder="Email Address" required/><br>
                                    <input type="password" name="password" id="password" placeholder="password" required/><br>
                                    <div>
                                         <div class="col-md-4 col-sm-5 col-xs-4" style="padding-left:0px;"><input type="checkbox" name="terms" id="terms" value="remember me" checked/><span class="policy">Remember me</span></div>
                                        <div class="col-md-6 col-sm-7 col-xs-8"><a href="forgot-password.php" class="forgot-pass" style="color:#999;">Forgot Password?</a></div>
                                        <div class="clear-crowd"></div>
                                    </div>
                                    <input type="submit" name="login_submit" id="login_submit" value="LOGIN"/>
                                    <div class="col-md-12 login-link" style="padding-left:0px;"><span>Want to join Nutrinoz? <a href="join-us.php" class="up-log">Join-Us</a></span></div>
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