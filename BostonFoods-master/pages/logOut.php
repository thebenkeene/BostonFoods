<?php

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
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Log Out Page</title>
        <link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body style="background-image: url(../img/boston.jpg)">
<fieldset class="fieldset">
	<legend id="green" style="background-color: black">Success!</legend>
	<h1 id="green" style="background-color: black">You are now logged out!</h1>
	<a id="green" style="background-color: black" href="../home.php">return home!</a>
	</form>
</fieldset>

</body>
</html>