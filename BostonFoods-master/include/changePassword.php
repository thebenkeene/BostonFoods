<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Change Password</title>
</head>
<body>
	<?php handler();
	?>
	
</body>
</html>
<?php
function handler(){
	include ('dbconn.php');
	$email = $_POST['email'];
	$connect = connect_to_db("keeneb");
	$query = "select * from customers where email= \"$email\"";
	$result = perform_query($connect, $query);
	if (mysqli_fetch_array( $result, MYSQLI_ASSOC )){
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); 
        $alphaLength = strlen($alphabet) - 1; 
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
    	$password= implode($pass);
    	$password2 = "$password";
    	$email1 = "$email";
    	$password1 = sha1($password); 
    	$query1 = "update club set Password = \"$password1\" where email= \"$email\"";
    	$result1 = perform_query($connect, $query1);
    	mail($email1, "New Password", $password2);
		echo "A new password has been emailed to you.";
		echo "<a href='http://cscilab.bc.edu/~crawfocc/project/.home. php'>Homepage</a>";
		
	}
	else {
	    echo "This email does not exist.";
	    echo "<a href='http://cscilab.bc.edu/~crawfocc/project/.home.php?pass=forgot+password'>Back</a>";
		disconnect_from_db( $connect, $result);
		

	}


}