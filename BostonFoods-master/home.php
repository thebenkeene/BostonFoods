<?php

include ('include/dbconn.php');


$userName = null;
$admin = 0;
if(isset($_COOKIE["firstName"])){
  $userName = $_COOKIE["firstName"];
}
if(isset($_COOKIE["isAdmin"])){
	$id = $_COOKIE["ID"];
	$connect = connect_to_db("crawfocc");
	$query = "select * from CUSTOMERS WHERE `ID` = $id";
	$result = perform_query($connect, $query);
	$status = 0;
	$admin = $_COOKIE["isAdmin"];
	while ($row = $result->fetch_assoc()) {
      $status = $row["IsAdmin"];
	}
	while(true){
		if($admin == $status){
			break;
		}
		if($admin == 1 && $status == 0){
			setcookie("isAdmin", 0, time() + (86400 * 30),"/");
			$admin = 0;
			break;
		}
		if($admin == 0 && $status == 1){
			setcookie("isAdmin", 1, time() + (86400 * 30),"/");
			$admin = 1;
			break;
		}

	}

	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<meta charset="utf-8" />
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body background= "back.jpg">

<div class="title">
<?php

if($userName != null){
	echo "Hello $userName!";
} 
else {
	echo "Hello New User!";
}

?>
<h1>Welcome to Boston Foods</h1>
<h2>Boston Foods is a non-profit organization with a simple purpose:</h2>
<h2>To sell delicious, healthy, high-quality foods at affordable prices, particularly to folks living in areas with limited access to nutritious eating options.</h2>

</div>
	<ul>
		<?php
		echo "<div class=\"options\">";
		if($admin == 1){
			echo "<li><a href=\"include/admin.php\">Admin Page!</a></li> 
			 <li><a href=\"pages/deliveryLocations.html\">Delivery Locations</a></li> 
			 <li><a href=\"pages/deliverySchedule.html\">Delivery Schedule</a></li>";
		}

		if($userName != null){
			echo "<li><a  href=\"pages/order.html\">Order!</a></li>";
			echo "<li><a  href=\"pages/logOut.html\">Log Out!</a></li>";
			echo "<li><a  href=\"pages/editAccount.html\">Edit Account</a></li>";

		} else {
			echo "<li><a  href=\"pages/logIn.html\">Log in!</a></li>";
		}

		?>
		<li><a href="pages/createaccount.html">Create An Account!</a></li>
		<li><a href="pages/forgotPass.html">Forget Your Password?</a></li>
		<li><a href="pages/aboutUs.html">About Us</a></li>
		<li><a href="pages/boxes.html">Boxes</a></li> 
	</ul>
</body>
</html>