<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	</head>
	<body style="background-image: url(../img/boston.jpg)">

<?php
include ("dbconn.php");
$admin = $_GET["isAdmin"];
$id = $_GET["id"];

if($admin == 1) {

	$dbc = connect_to_db( "crawfocc" );
 	$query2 = "UPDATE `CUSTOMERS` SET `IsAdmin`=0 WHERE `ID` = '$id';";
	$result = mysqli_query($dbc, $query2) or
			die( "bad query".mysqli_error( $dbc ) );

	echo "<h2 id=\"green\" style=\"background:black\">This user is no longer an admin!</h2>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../home.php\">return home!</a><br>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../include/admin.php\">return to Admin Page!</a>";
 
 	} else {
 	$dbc = connect_to_db( "crawfocc" );
 	$query2 = "UPDATE `CUSTOMERS` SET `IsAdmin`=1 WHERE `ID` = '$id';";
	$result = mysqli_query($dbc, $query2) or
			die( "bad query".mysqli_error( $dbc ) );

 	echo "<h2 id=\"green\" style=\"background:black\">This user is now an admin!</h2>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../home.php\">return home!</a><br>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../include/admin.php\">return to Admin Page!</a>";

 	}

 ?>

   </body>
  </html>