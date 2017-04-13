<?php 
require('includes/Dbconfig.php');
if(@$_SESSION['user_id']){
	header("Location:user-profile.php");
}
function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

$error = false;
if(isset($_POST['fp-submit'])){
	$email = mysqli_real_escape_string($con, $_POST['f-pass']);
	$enc_id = encryptIt($email);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = true;
		$email_error = "Invalid email";
	}
	else{
		//check if email already exist
		$query = "select user_email from nutrinoz_users where user_email='$email'";
		$run = mysqli_query($con, $query);
		$result = mysqli_num_rows($run);
		if($result ==0){
			$error = true;
			$email_error = "Unregistered email";
		}
		else if(!$error){
			$token=md5(uniqid(rand()));
			$queryX = "UPDATE nutrinoz_users SET token = '$token' WHERE user_email = '$email'";
			$run = mysqli_query($con, $queryX);
			if(!$run){
				$email_error = "Some error occured";
			}
			else{
				$to = $email;  // send e-mail to ...
		        $subject = "Reset password - Nutrinoz Restaurant"; // Your subject
		        $header = "From: Nutrinoz care@nutrinoz.com"; // From
		        $message = " 
Please click this link to reset your account password:\r\n";
                $message .= "www.nutrinoz.com/reset-password.php?token=$token"; //cofirmation link....
		        $sentmail = mail($to, $subject, $message, $header); // send email */
				if(!$sentmail){
					$email_error = "Error while sending a reset-password link to your email";
				}
				else{
					$email_error = "<span style='color:green;'>An reset password link sent to your email";
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
	<title>Forgot password - Nutrinoz</title>
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
    
    <div class="forgot-pass-section fps">
        <div class="f-pass">
            <h3>Forgot password</h3>
            <form method="post" action="">
                <span class="f-error"><?php echo @$email_error; ?></span><br>
                <input type="text" name="f-pass" id="f-pass" placeholder="Enter Your Email"/><br>
                <input type="submit" name="fp-submit"/>
            </form>
        </div>
    </div>
    
</body>
</html>