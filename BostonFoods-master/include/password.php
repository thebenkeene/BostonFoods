<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Check Password</title>
</head>
<body>
	<?php checkpassword();
	?>
	
</body>
</html>
<?php
function checkpassword(){
	include ('dbconn.php');
	$answer = "1785ed6ccf537856a2e5d0935a1ffb2dde2d3ab5";
	$user = sha1($_POST['password']);
	$type = $_POST['membership'];
		if ($answer == $user){
			$connect = connect_to_db("crawfocc");
			$query = "select email from club where MembershipType =\"$type\"";
			$result = perform_query($connect, $query);
			if (mysqli_num_rows($result) > 0) {
    			while($row = $result->fetch_assoc()) {
      				$to = $row["email"];		
					$msg = $_POST['message'];
					$subject = $_POST['subject'];
					mail($to, "$subject" ,"$msg");

				}
				echo "email sent!";
			}
			else {
    			echo "0 results";
    		}
    	}
		else{
			echo "Wrong Password";
		}
}