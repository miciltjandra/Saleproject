<!DOCTYPE html>
<html>
	<head>
		<title> Login page </title>
	</head>
	<body>
		<h1> SaleProject </h1>
		<form action = "actionlogin.php" method = "post" id = "loginform">
				<legend align = "left"> Login </legend>
				<?php
					if(!empty($_COOKIE["login"])) {
						$login = $_COOKIE["login"];
						if ($login == "error") {
							echo "Login Error <br/>\n";
						}
						setcookie("login", "");
					}
				?>
				Email or Username <br/>
				<input type = "text" name = "user"> <br/>
				Password <br/>
				<input type = "password" name = "pass"> <br/>
				<input type = "submit" value = "Login">
		</form>
		<br/>
		Don't have an account yet? Register <a href = "register.php"> here </a>
	</body>

</html>