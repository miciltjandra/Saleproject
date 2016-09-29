<!DOCTYPE html>
<html>
	<head>
		<title> Register page </title>
		<script src="registerscript.js"></script>
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
    ?>
	<body>
		<h1> SaleProject </h1>
		<form action="actionregister.php" method="post" id="loginform" onsubmit="return validateform()">
				<legend align="left"> Registration </legend>

				<?php
					if(!empty($_REQUEST["q"])) {
						if ($_REQUEST["q"] == "error") {
							echo "Registration Error <br/>\n";
						}
					}
				?>

				Full Name <br/>
				<input type="text" name="name" id="name" required="required" oninput="validate(this.value, this.name)">
				<span id="validname"></span> <br/>
				Username <br/>
				<input type="text" name="user" id="user" required="required" oninput="searchUsername(this.value);validate(this.value,this.name)">
				<span id="validuser"></span>
				<span id="userexist"></span> <br/>
				Email <br/>
				<input type="text" name="email" id="email" required="required" oninput="validate(this.value, this.name)">
				<span id="validemail"></span> <br/>
				Password <br/>
				<input type="password" name="pass" id="pass" required="required"> <br/>
				Confirm Password <br/>
				<input type="password" name="confirmpass" id="pass2" required="required" oninput="confirmPassword()">
				<span id="diffpass"></span> <br/>
				Full Address <br/>
				<input type="text" name="address" id="address" required="required"> <br/>
				Postal Code <br/>
				<input type="text" name="postcode" id="postcode" maxlength="5" required="required" oninput="validate(this.value,this.name)">
				<span id="validpostcode"></span> <br/>
				Phone Number <br/>
				<input type="text" name="phone" id="phone" maxlength="12" required="required" oninput="validate(this.value,this.name)">
				<span id="validphone"></span> <br/>
				<input type="submit" value="Register" id="registersubmit">
		</form>
		<br/>
		Already have an account? Login <a href="index.php"> here </a>
	</body>

</html>