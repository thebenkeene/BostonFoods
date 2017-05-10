<?php
	include ("dbconn.php");

	$id = $_COOKIE["ID"];
	$connect = connect_to_db("crawfocc");
	$query = "select * from CUSTOMERS WHERE `ID` = $id";
	$result = perform_query($connect, $query);

	$password = "";

	while ($row = $result->fetch_assoc()) {
      $password = $row["Password"];
	}

	if(sha1($_POST["password1"]) != $password){
		?>
		<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	</head>
	<body style="background-image: url(../img/boston.jpg)">
	<title>Delete Account</title>
		<?php

		echo "<h2 id=\"green\" style=\"background:black\">Incorrect Password</h2>";
		echo "<a id=\"green\" style=\"background:black\" href=\"../home.php\">return home!</a><br>";
		echo "<a id=\"green\" style=\"background:black\" href=\"../pages/editAccount.html\">Try Again!</a>";

	} else {

	$dbc = connect_to_db( "crawfocc" );

	$fName = $_POST["firstname"];
	$lName = $_POST["lastname"];
	$phone = $_POST["phone"];
	$newPass = sha1($_POST["newPass"]);

	$query = "UPDATE `CUSTOMERS` SET `FirstName`= '$fName', `LastName`='$lName' , `Phone`='$phone', `Password`='$newPass' WHERE `ID` = '$id';";
	perform_query($dbc, $query);
	setcookie("firstName", $fName, time() + (86400 * 30),"/");
	setcookie("lastName", $lName, time() + (86400 * 30),"/");

	?>
<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	</head>
	<body style="background-image: url(../img/boston.jpg)">
	<title>Delete Account</title>
	<?php
	echo "<h2 id=\"green\" style=\"background:black\">Account successfully Updated!</h2>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../home.php\">return home!</a><br>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../pages/editAccount.html\">return to Edit Account!</a>";
	}
?>
  </body>
  </html>