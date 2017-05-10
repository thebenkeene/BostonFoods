<?php
	include ("dbconn.php");
	$dbc = connect_to_db( "crawfocc" );
	$loc = "\"".$_POST["locations"]."\"";
	//echo "<br>" . $loc . "<br>";
	$query = "DELETE FROM `DELIVERY_LOCATIONS` WHERE `Location_Name` = $loc;";
	perform_query($dbc, $query);
	?>

	<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	</head>
	<body style="background-image: url(../img/boston.jpg)">

	<?php
	echo "<h2 id=\"green\" style=\"background:black\">Location successfully deleted!</h2>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../home.php\">return home!</a><br>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../pages/deliveryLocations.html\">return to Deliveries!</a>";
?>
	</body>
	</html>