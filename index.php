<!DOCTYPE html>
<html>
	<head>
		<title> Login page </title>
		<link rel="stylesheet" href="style.css">
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
    ?>
	<body class="middle">
		<form action = "actionlogin.php" method = "post" id = "loginform"  class="text">
			<legend class="text large"> Please Login </legend>
			<hr>
			<?php
				if(!empty($_GET["q"])) {
					if ($_GET["q"] == "error") {
						echo '<p class="error">Login Error </p>' . "\n";
					}
				}
			?>
			Email or Username <br/>
			<input type = "text" name = "user"> <br/>
			Password <br/>
			<input type = "password" name = "pass"> <br/>
			<input type = "submit" value = "Login">
		</form>
		<br/>
		<div class="text">Don't have an account yet? Register <a href = "register.php"> here </a></div>
	</body>

</html>