<?php
require('includes/Dbconfig.php');

		if(isset($_POST['repass']) & isset($_POST['cpass']) & isset($_POST['token'])){
		    $repass = mysqli_real_escape_string($con, $_POST['repass']);
		    $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
		    $token = mysqli_real_escape_string($con, $_POST['token']);
			
			if(strlen($repass) < 8) {
                $error = true;
                $pass_error = "Atleast 8 characters required";
            }
			else if($repass != $cpass) {
                $error = true;
                $pass_error = "Password not maching";
            }
			if(!$error){
				$hash = password_hash($repass, PASSWORD_BCRYPT);
				$queryX = "UPDATE nutrinoz_users SET user_password = '$hash' AND tooken = '' WHERE token = '$token'";
				$run = mysqli_query($con, $queryX);
				if(!$run){
					$pass_error = "Some error while reseting password";
				}
				else{
					$pass_error = "<span style='color:green;'>Your password successfully updated.</span>";
				}
			}
			echo json_encode($pass_error);
		}
	

mysqli_close($con);
?>