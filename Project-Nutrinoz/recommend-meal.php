<?php 
require_once('includes/Dbconfig.php');
include ('includes/session.php');
if(isset($_GET['v1']) & isset($_GET['v2']) &isset($_GET['v3'])){
	$typo = htmlspecialchars($_GET['v1']);
	$total_meal = htmlspecialchars($_GET['v2']);
	$cal = htmlspecialchars($_GET['v3']);
    $diet_plan = mysqli_query($con,  "SELECT * FROM diet_plan WHERE diet_cal_amount = '$cal' AND diet_type = '$typo' AND meal_num = '$total_meal'");
    if(@mysqli_num_rows($diet_plan) > 0){
	    $dietData = mysqli_fetch_array($diet_plan);
	    $diet_id = $dietData['diet_id'];
	    $total_meal = $dietData['meal_num'];
    

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nutronoz Diet plan</title>
    <link rel="icon" href="images/icon-logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/joinus.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/meal-plan.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    <script type="text/javascript">WebFont.load({
       google: {
         families: ["Montserrat:400,700","Unna:regular","Source Sans Pro:regular,italic,700","Raleway:300,regular,500,600,700,800,900","Libre Baskerville:regular,italic,700"]
       } });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var carbs = <?php echo $dietData['carbs']; ?>;
    var protein = <?php echo $dietData['protein']; ?>;
    var fat = <?php echo $dietData['fat']; ?>;
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(dietPlanChart);
      function dietPlanChart() {
        var data = google.visualization.arrayToDataTable([
          ['Nutrients', 'in gram'],
          ['Carbs',  carbs],
          ['Protein', protein ],
          ['Fat', fat],
        ]);

      var options = {
        legend: {position: 'bottom', textStyle: {color: ''}},
        pieStartAngle: 100,
        pieSliceText: 'percentage',
        width: 250,
        height: 300,
        colors: ['#45912e', '#57b63a', '#78c461'],
        backgroundColor: 'transparent',
      };

        var chart = new google.visualization.PieChart(document.getElementById('chartContainer'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
    
   <div class="header-section nv">
        <div class="mob-div">
            <div class="m-inner-div">
                <div class="left">
                     <li><a href="#" onclick="openNav()"><img src="images/menu-bar.png"/></a></li>
                     <li><a href="#"><img src="images/icon-logo.png" width="32px" height="32px"/></a></li>
                </div>
                <div class="right">
                    <li><a href="#">join us</a></li>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
        <div class="outer-div">
            <div class="inner-div">
                <div class="n-brand">
                    <div class="n-logo">
                        <a href="index.php"><img src="images/logo_new_icon.png" class="nv-logo" alt="Nutrinoz-logo"/></a>
                    </div>
                </div>
                <div class="n-menu">
                    <div class="n-nav" id="mySidenav">
                        <ul>
                            <li><img src="images/logo_new_icon.png" class="sm-logo"></li>
                            <li><a href="menu.php">menu</a></li>
                            <li><a href="diet-plan.php">diet plan</a></li>
                            <li><a href="#">order</a></li>
                            <li><a href="#">blog</a></li>
                            <li><a href="visit-us.php">visit us</a></li>
                            <li><a href="join-us.php" class="ext-join">join us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    
    <div class="p-n1-menu">
        <div class="p-n1-content p-n-m-content">
            <p class="n1-title n-m-title">Diet plan</p>
            <p class="n1-subtitle n-m-subtitle">2000 kCalories Diet Plan</p>
            <hr style="border-top:2px solid #57b63a;width:20%;" align="left"/>
        </div>
    </div>
    
    <div class="n2-dp">
        <div class="n2-od">
            <div class="n2-id">
                <div class="col-md-5 col-sm-5 col-xs-6">
                    <div class="n2-all-pie" id="chartContainer"></div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-6">
                    <div class="n2-all-info">
                        <div class="col-xs-7">
                            <span class="nutri">Calories: </span><span class="i-data"><?php echo $dietData['diet_cal_amount']; ?>kCal</span><br>
                            <span class="nutri">Carbs: </span><span class="i-data"><?php echo $dietData['carbs']; ?>g</span><br>
                            <span class="nutri">Protein: </span><span class="i-data"><?php echo $dietData['protein']; ?>g</span><br>
                            <span class="nutri">Fat: </span><span class="i-data"><?php echo $dietData['fat']; ?>g</span><br>
                            <span class="nutri">Cost: </span><span class="i-data"><?php echo $dietData['cost']; ?>/day</span><br>
                        </div>
                        <div class="col-xs-5">
                            <div class="more-info"><a href="#totalCal" role="button" data-toggle="modal">Detail Info</a></div>
                        </div>
                        <div class="clear-crowd"></div>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    
    <div class="n3-dp">
        <div class="n3-od">
            <div class="n3-id">
                <div class="n3-meal">
				<?php 
				    for($i=1; $i<=$total_meal; $i++){
				?>
                    <div class="meal-1">
                        <div class="col-md-9 col-sm-9 meal-desc">
                            <div class="inner-div">
                                <div class="meal-name">
                                    <div class="col-xs-3" style="padding-left:0;">Meal - <?php echo $i; ?></div>
                                    <div class="col-xs-5"><a href="#"><img src="images/change.png" style="max-width:100%;"/></a></div>
                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-3"><a href="#eachMeal<?php echo $i; ?>" role="button" data-toggle="modal">Detail info</a></div>
                                    <div class="clear-crowd"></div>
                                </div>
								<?php 
								    $query = "SELECT * FROM diet_meal WHERE diet_id = '$diet_id' AND meal_num = '$i'";
						            $diet_meal = mysqli_query($con, $query);
						            while($dietMealData = mysqli_fetch_array($diet_meal)){
								?>
                                <div class="meal-detail">
                                    <div class="meal-no">
                                        <div class="col-xs-2" style="padding-left:0;"><img src="diet_images/<?php echo $dietMealData['meal_img']; ?>" style="max-width:100%;"></div>
                                        <div class="col-xs-6 padd"><a href="#mealCal" role="button" data-toggle="modal"><?php echo $dietMealData['meal_name']; ?></a></div>
                                        <div class="col-xs-2 padd"><?php echo $dietMealData['meal_quantity']; ?></div>
                                        <div class="col-xs-2 padd"><?php echo $dietMealData['meal_cal']; ?> kCal</div>
                                        <div class="clear-crowd"></div>
                                    </div> 
                                </div>								
						        <?php } ?>
                            </div>
                        </div>
						<?php 
						    $sumQuery = "SELECT sum(meal_cal) AS cal, sum(meal_carbs) AS carbs, sum(meal_protein) AS protein, sum(meal_fat) AS fat, sum(meal_cost) AS cost FROM diet_meal WHERE diet_id = '$diet_id' AND meal_num = '$i'";
						    $diet_meal = mysqli_query($con, $sumQuery);
						    while($dietMealData = @mysqli_fetch_array($diet_meal)){
						?>
                        <div class="col-md-3 col-sm-3 meal-pie">
                            <div class="n3-dp-pie" id="specMeal">
							    <span class="nutri">Calories: </span><span class="i-data"><?php echo $dietMealData['cal']; ?>kCal</span><br>
                                <span class="nutri">Carbs: </span><span class="i-data"><?php echo $dietMealData['carbs']; ?>g</span><br>
                                <span class="nutri">Protein: </span><span class="i-data"><?php echo $dietMealData['protein']; ?>g</span><br>
                                <span class="nutri">Fat: </span><span class="i-data"><?php echo $dietMealData['fat']; ?>g</span><br>
                               <span class="nutri">Cost: </span><span class="i-data"><?php echo $dietMealData['cost']; ?>/day</span><br>
							</div>
                        </div>
						
						<div class="modal fade" id="eachMeal<?php echo $i; ?>">
		                    <div class="modal-dialog" style="left:0px;">
			                    <div class="modal-content">
				                    <div class="modal-header">
						                <button class="close" data-dismiss="modal">&times;</button>
						                <h4 class="modal-title" style="color:#57b63a;">Detail Nutritional Info</h4>
					                </div>
				                    <div class="modal-body">
				                        <span class="nutri">Calories: </span><span class="i-data"><?php echo $dietMealData['cal']; ?>kCal</span><br>
                                        <span class="nutri">Carbs: </span><span class="i-data"><?php echo $dietMealData['carbs']; ?>g</span><br>
                                        <span class="nutri">Protein: </span><span class="i-data"><?php echo $dietMealData['protein']; ?>g</span><br>
                                        <span class="nutri">Fat: </span><span class="i-data"><?php echo $dietMealData['fat']; ?>g</span><br>
                                        <span class="nutri">Cost: </span><span class="i-data"><?php echo $dietMealData['cost']; ?>/day</span><br>
				                    </div>
			                    </div>
		                    </div>
	                    </div>	
						
						<?php } ?>						
                        <div class="clear-crowd"></div>
                    </div>
				<?php }  ?>
                </div>
            </div>
        </div>
    </div>
	
	<div class="modal fade" id="totalCal">
		<div class="modal-dialog" style="left:0px;">
			<div class="modal-content">
				<div class="modal-header">
						<button class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="color:#57b63a;">Detail Nutritional Info</h4>
					</div>
				<div class="modal-body">
				    <span class="nutri">Calories: </span><span class="i-data"><?php echo $dietData['diet_cal_amount']; ?>kCal</span><br>
                    <span class="nutri">Carbs: </span><span class="i-data"><?php echo $dietData['carbs']; ?>g</span><br>
                    <span class="nutri">Protein: </span><span class="i-data"><?php echo $dietData['protein']; ?>g</span><br>
                    <span class="nutri">Fat: </span><span class="i-data"><?php echo $dietData['fat']; ?>g</span><br>
                    <span class="nutri">Cost: </span><span class="i-data"><?php echo $dietData['cost']; ?>/day</span><br>
				</div>
			</div>
		</div>
	</div>

 	
	
	<div class="modal fade" id="mealCal">
		<div class="modal-dialog" style="left:0px;">
			<div class="modal-content">
				<div class="modal-header">
						<button class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="color:#57b63a;">Detail Nutritional Info</h4>
					</div>
				<div class="modal-body">
				    <span class="nutri">Calories: </span><span class="i-data"><?php echo $dietData['diet_cal_amount']; ?>kCal</span><br>
                    <span class="nutri">Carbs: </span><span class="i-data"><?php echo $dietData['carbs']; ?>g</span><br>
                    <span class="nutri">Protein: </span><span class="i-data"><?php echo $dietData['protein']; ?>g</span><br>
                    <span class="nutri">Fat: </span><span class="i-data"><?php echo $dietData['fat']; ?>g</span><br>
                    <span class="nutri">Cost: </span><span class="i-data"><?php echo $dietData['cost']; ?>/day</span><br>
				</div>
			</div>
		</div>
	</div>	
	
</body>
</html>
<?php } } ?>