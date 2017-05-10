
		<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8" />
	<title>Join Page</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	</head>
	<body style="background-image: url(../img/boston.jpg)">

<?php
	include ("dbconn.php");
	handleForm();
	function handleForm(){
		$dbc = connect_to_db( "crawfocc" );
		$name = $_POST["name"];
		$address = $_POST["address"];

		$query = "SELECT * FROM DELIVERY_LOCATIONS WHERE Location_Name = '$name'";
		$result = perform_query($dbc, $query);
		$a = mysqli_fetch_array( $result, MYSQLI_ASSOC );
		if (mysqli_num_rows( $result ) != 0){
			echo "<h2 id=\"green\" style=\"background:black\">This Delivery Location already exists</h2>";
			echo "<a id=\"green\" style=\"background:black\" href=\"../pages/deliveryLocations.html\">Return to add new location</a>";
			die("");
		} 
		$query2 = "INSERT INTO DELIVERY_LOCATIONS (Location_Name, Location_Address) VALUES ('$name', '$address')";
		perform_query($dbc, $query2);
		echo "<h2 id=\"green\" style=\"background:black\">Location added successfully!</h2>";
		echo "<a id=\"green\" style=\"background:black\" href=\"../pages/deliveryLocations.html\">go back</a>";
	}
	?>

	</body>
	</html>