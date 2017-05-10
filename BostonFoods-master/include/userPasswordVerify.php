<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Verify Password</title>
</head>
<body>
	<?php checkUserPass();
	?>
	
</body>
</html>
<?php
function checkUserPass(){
	include ('dbconn.php');
	$first= $_POST["firstname"];
	$last = $_POST["last"];
	$phone = $_POST["phone"];
	$pass = $_POST["password"];
	$email = $_POST["email"];
	$connect = connect_to_db("keeneb");
	$query = "select Password from Customers where Email =\"$email\"";
	$result = perform_query($connect, $query);
		if (mysqli_fetch_array( $result, MYSQLI_ASSOC )){
			$query = "UPDATE Customers SET ID=$id, FirstName=$first, Lastname=$last, Phone=$Phone, Password= $newpass WHERE Email=$email";
			$result = perform_query($connect, $query);
		}
		else{
			echo "Email does not exist."
		}

}