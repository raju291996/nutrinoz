<?php
require_once ('includes/Dbconfig.php');
include('includes/session.php');
if(isset($_GET['menu'])){
$menu_cat = htmlspecialchars(mysqli_real_escape_string($con, $_GET['menu']));
$query = "SELECT * FROM nutrinoz_menu WHERE menu_category = '$menu_cat'";
$run = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu - Nutronoz</title>
    <link rel="icon" href="images/icon-logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
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
    
    <div class="p-n1-menu">
        <div class="p-n1-content p-n-m-content">
            <p class="n1-title n-m-title">menu</p>
            <p class="n1-subtitle n-m-subtitle"><?php echo $menu_cat?> Menu</p>
            <hr style="border-top:2px solid #57b63a;width:20%;" align="left"/>
        </div>
    </div>
    <a href="#menu-page" class="u-arrow-link"><div class="arrow-link"><img src="images/down-arrow.png" width="20px" height="20px"/></div></a>
    
    <div class="breakfast-section">
        <div class="p-n2-breakfast">
            <div class="b-title">
                <h5><?php echo $menu_cat; ?> menu</h5>
            </div>
            <div class="b-desc">
			<?php 
			    if($rows = mysqli_num_rows($run) > 0 ){ 
				while($menu = mysqli_fetch_array($run)){
					$dish_taste = explode(',', $menu['dish_taste']);
			?>
                <div class="b-name-img">
                    <div class="col-md-6 col-sm-6 img"><img src="images/<?php echo $menu['dish_image_name']; ?>"/></div>
                    <div class="col-md-6 col-sm-6 name">
                        <h5 class="minititle"><?php echo $menu['menu_category']; ?></h5>
                        <h2 class="h2-heading"><?php echo $menu['dish_name']; ?></h2>
                        <hr class="hr" align="left"/>
                        <div><span class="dish-type"><?php echo @$dish_taste[0]; ?></span><span class="dish-type"><?php echo @$dish_taste[1]; ?></span><span class="dish-type"><?php echo @$dish_taste[2]; ?></span></div>
                        <p class="intro-para"><?php echo $menu['dish_desc']; ?></p>
                        <div class="cal">Calories: <?php echo $menu['dish_calorie']; ?> <span class="dash">|</span> Rs: <?php echo $menu['dish_price']; ?>/-</div>
                    </div>
                    <div class="clear-crowd"></div>
                </div>
				<?php } 
				} else {
					echo "<span>Sorry, right now no menu available for ". $menu_cat .", we are working on it.It will come soon.</span>";
				} }?>
            </div>
        </div>
    </div>
    
    
<?php include ('includes/footer.php'); ?>
<script type="text/javascript" src="js/script.js"></script>  
</body>
</html>