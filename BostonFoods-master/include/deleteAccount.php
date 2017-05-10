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

	if(sha1($_POST["password11"]) != $password){
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

	$query = "DELETE FROM `CUSTOMERS` WHERE `ID` = '$id';";
	perform_query($dbc, $query);

	if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
	?>
<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	</head>
	<body style="background-image: url(../img/boston.jpg)">
	<title>Delete Account</title>
	<?php
	echo "<h2 id=\"green\" style=\"background:black\">Account successfully deleted!</h2>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../home.php\">return home!</a><br>";
	echo "<a id=\"green\" style=\"background:black\" href=\"../pages/editAccount.html\">return to Edit Account!</a>";
	}
?>
  </body>
  </html>