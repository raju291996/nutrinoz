<?php 
require('includes/Dbconfig.php');
if(@$_SESSION['user_id']){
	header("Location:user-profile.php");
}
function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
$error = false;
if(isset($_GET['token'])){
	$token = $_GET['token'];
	$query = "SELECT * FROM nutrinoz_users WHERE token = '$token'";
	$run = mysqli_query($con, $query);
	if(@mysqli_num_rows($run) == 0 ){
		echo "Invalid url";
		exit();
	}
	else{
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
            <h3>Reset password</h3>
            <form method="post" action="">
                <span class="f-error"></span><br>
                <input type="password" name="re-pass" id="re-pass" placeholder="Enter Password"/><br>
                <input type="password" name="c-pass" id="c-pass" placeholder="Retype Password"/><br>
                <input type="submit" name="repass-submit" id="repass-submit"/>
            </form>
        </div>
    </div>
    
<script>
$(document).ready(function(){
	$("#repass-submit").click(function(){
		var token = <?php echo $token; ?>;
		var repass = $('#re-pass').val();
		var cpass = $('#c-pass').val();
		$.ajax({
		type: "POST",
		url: "change.php",
		data: {repass : repass, cpass= cpass, token= token},
		success: function(data){
			$(".f-error").html(data.pass_error);
		}
		});
	});
});
</script>

</body>
</html>

<?php } } ?>