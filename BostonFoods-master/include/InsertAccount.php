<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<title>Insert Account</title>
	</head>
	<body style="background-image: url(../img/boston.jpg)">

<?php
	include ("dbconn.php");
	handleForm();
	function handleForm(){
		$dbc = connect_to_db( "crawfocc" );
		$firstname = "\"".$_POST["firstname"]."\"";
		$lastname = "\"".$_POST["lastname"]."\"";
		$email = "\"".$_POST["email"]."\"";
		$phone = $_POST["phone"];
		$password1 = $_POST["password1"];
		$password2 = $_POST["password2"];


		$p = "\"".sha1($password1)."\"";

		$query = "SELECT * FROM `CUSTOMERS` WHERE `Email` = $email";
		$result = perform_query($dbc, $query);

		$a = mysqli_fetch_array( $result, MYSQLI_ASSOC );
	
		if (mysqli_num_rows( $result ) != 0){
			echo "<div id=\"green\" style=\"background:black\">This email is already in use</div>";
			echo "<br>";
			echo "<a id=\"green\" style=\"background:black\" href=\"../pages/createaccount.html\">Return to sign-up</a>";

		} else {

		$query2 = "INSERT INTO CUSTOMERS (FirstName, LastName, Phone, Email, Password, IsAdmin) VALUES ($firstname, $lastname, $phone, $email, $p, 0)";
		perform_query($dbc, $query2);
		echo "<h1 id=\"green\" style=\"background:black\">Welcome to Boston Foods!</h1>";
		echo "<a id=\"green\" style=\"background:black\"href=\"../home.php\">return to the home page</a>";
	}
}
?>

</body>
</html>
