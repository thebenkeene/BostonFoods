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
	handleForm();
	function handleForm(){
		$dbc = connect_to_db( "crawfocc" );
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$ID = $_POST["ID"];
		//echo $_POST["box"];
		//echo $_POST["schedule"];
		$boxTypeQ = (explode("|",($_POST["box"])));
		//print_r($boxTypeQ);
		$boxType = $boxTypeQ[0];
		$price = $boxTypeQ[1];
		$locNameQ = (explode("|",($_POST["schedule"])));
		//print_r($locNameQ);
		$locName = $locNameQ[0];
		$date = $locNameQ[1];
		$quantity = $_POST["quantity"];

		$query = "INSERT INTO `CURRENT_ORDERS` (PickupDate, FirstName, LastName, CustID, BoxType, Quantity, Price, DeliveryLocation) VALUES ('$date', '$firstName', '$lastName', $ID, '$boxType', $quantity, $price, '$locName');";
		//echo $query;
		perform_query($dbc, $query);
		echo "<h2 id=\"green\" style=\"background-color: black\">Order Successful!</h2>";
		echo "<a id=\"green\" style=\"background-color: black\" href=\"../home.php\">go to the Home Page!</a><br>";
		echo "<a id=\"green\" style=\"background-color: black\" href=\"../pages/order.html\">go back to Orders!</a>";
	}
	