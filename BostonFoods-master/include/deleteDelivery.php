<?php
	include ("dbconn.php");
	$dbc = connect_to_db( "crawfocc" );
	$name = $_GET["name"];
	$date = $_GET["date"];
	$time = $_GET["time"];

	//$query = "DELETE FROM `DELIVERY_SCHEDULE` WHERE `LocationName` = '$name' AND 'DateT' = '$date' AND 'TimeT' = '$time';";



	$query2 = "DELETE FROM `DELIVERY_SCHEDULE` WHERE `DateT` = '$date' AND `TimeT` = '$time' AND `LocationName` = '$name' LIMIT 1";
	$result = mysqli_query($dbc, $query2) or
			die( "bad query".mysqli_error( $dbc ) );
	?>

	<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	</head>
	<body style="background-image: url(../img/boston.jpg)">


	<?php
	echo "<h2 id=\"green\" style=\"background:black\">Delivery successfully deleted!</h2>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../home.php\">return home!</a><br>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../pages/deliverySchedule.html\">return to Deliveries Schedule!</a>";
?>
  </body>
  </html>