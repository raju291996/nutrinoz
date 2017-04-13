<?php

$dbhost = 'localhost';
$dbuser = 'id1234500_nutrinoz_db';
$dbpass = '7895183128';
$dbname = 'id1234500_nutrinoz';

$con = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Could not connect: ' . mysql_error());
$selectDb  = mysqli_select_db($con, $dbname) or die ('Could not connect to database: ' . mysql_error());

?>