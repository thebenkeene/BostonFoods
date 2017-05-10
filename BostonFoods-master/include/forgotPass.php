<?php
include "dbconn.php";
?>
<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<title>Forgot Password</title>
	</head>
	<body style="background-image: url(../img/boston.jpg)">

<?php
	checkEmail();
?>

</body>
</html>

<?php


function checkEmail() {
	if(!isset($_POST["email"])) {
		badEmail();
	} else {
		//echo "<h1>TEST</h1>";
		if(tryDB()){
			goodEmail();
		} else {
			badEmail();
		}
	}
}

function badEmail() {
	echo "
		<fieldset class=\"fieldset\">
			<legend id=\"green\" style=\"background:black\">Error</legend>
			<p id=\"green\" style=\"background:black\">Your email is not registered to a username, please return and try a different email.</p>
			<a id=\"green\" style=\"background:black\" href=\"../pages/forgotPass.html\">Try Again</a>
			<a id=\"green\" style=\"background:black\" href=\"../home.php\">Return Home</a>
		</fieldset>
	";
}
function goodEmail() {
    sendEmail();
	echo "
		<fieldset class=\"Description\">
			<legend id=\"green\" style=\"background:black\">Success!</legend>
			<p id=\"green\" style=\"background:black\">Your password has been reset and the new password has been emailed to the email you provided.</p>
			<a id=\"green\" style=\"background:black\" href=\"../home.php\">Return Home</a>
		</fieldset>
	";
}
function tryDB() {
    $email = "\"".$_POST["email"]."\"";
	$connect = connect_to_db("crawfocc");
	$query = "SELECT * FROM `CUSTOMERS` WHERE Email = ". $email;
	//echo "<style>console.log($query);</style>";
	$testEmail = perform_query($connect,$query);
	$result = true;
	if($testEmail->num_rows == 0) {
		$result = false;
	}
	disconnect_from_db($connect, $testEmail);
	return $result;
	}


function sendEmail() {
  $headers = "From: webmaster@bostonFoods.com";
  $email = $_POST["email"];
  $newPass = generateRandomString();
  $message = "your new passowrd is " . $newPass;
  if(mail($email,"club password",$message) == False) {
  	badEmail();
  }
  $connect = connect_to_db("crawfocc");
  $query = "UPDATE `CUSTOMERS` SET Password=sha1("."\"$newPass\"".") WHERE Email="."\"$email\"";
  $q = perform_query($connect, $query,$headers);
  mysqli_close($connect);
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>