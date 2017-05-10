<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Order Complete!</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body style="background-image: url(../img/boston.jpg)">

</body>
</html>

<?php

	include ("dbconn.php");

	$dbc = connect_to_db( "crawfocc" );
	$id = $_POST["id"];
	$exploded = explode("|",$_POST["cOSelect"]);
	//print_r($exploded);
	$box = $exploded[0];
	$quantity = $exploded[1];
	$location = $exploded[2];
	$date = $exploded[3];

	$query = "DELETE FROM `CURRENT_ORDERS` WHERE `CustID` = $id AND `BoxType` = '$box' AND DeliveryLocation = '$location' AND `PickupDate` = '$date' AND `Quantity` = $quantity LIMIT 1;";

	perform_query($dbc, $query);
	echo "<h2 id=\"green\" style=\"background-color: black\">Order Deleted successfully!</h2>";
	echo "<a id=\"green\" style=\"background-color: black\" href=\"../home.php\">return home!</a><br>";
	echo "<a id=\"green\" style=\"background-color: black\" href=\"../pages/order.html\">return to Orders!</a>";


?>