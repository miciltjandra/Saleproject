<!DOCTYPE html>
<html>
	<head>
		<title> Register page </title>
		<script>
			function searchUsername(str) {
				if (str.length == 0) {
					document.getElementById("userexist").innerHTML = "";
				}
				else {
					var xmlhttp = new XMLHttpRequest();
			        xmlhttp.onreadystatechange = function() {
			            if (this.readyState == 4 && this.status == 200) {
			                document.getElementById("userexist").innerHTML = this.responseText;
			                //document.getElementById("registersubmit").disabled = true;

			            }
			        };
			        xmlhttp.open("GET", "checkusername.php?q=" + str, true);
			        xmlhttp.send();
					
				}
			}

			function confirmPassword() {
				var pass = document.getElementById("pass");
				var pass2 = document.getElementById("pass2");
				if (pass.value != pass2.value) {
					document.getElementById("diffpass").innerHTML = "Different password";
				}
				else {
					document.getElementById("diffpass").innerHTML = "Confirmed";
				}

			}


		</script>
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
    ?>
	<body>
		<h1> SaleProject </h1>
		<form action = "actionregister.php" method = "post" id = "loginform">
				<legend align = "left"> Registration </legend>

				<?php
					if(!empty($_COOKIE["register"])) {
						$login = $_COOKIE["register"];
						if ($login == "error") {
							echo "Registration Error <br/>\n";
						}
						setcookie("login", "");
					}
				?>

				Full Name <br/>
				<input type = "text" name = "name"> <br/>
				Username <br/>
				<input type = "text" name = "user" oninput = "searchUsername(this.value)">
				<span id = "userexist"></span> <br/>
				Email <br/>
				<input type = "text" name = "email" required = "required"> <br/>
				Password <br/>
				<input type = "password" name = "pass" id = "pass"> <br/>
				Confirm Password <br/>
				<input type = "password" name = "confirmpass" id = "pass2" oninput = "confirmPassword()">
				<span id = "diffpass"></span> <br/>
				Full Address <br/>
				<input type = "text" name = "address"> <br/>
				Postal Code <br/>
				<input type = "text" name = "postcode"> <br/>
				Phone Number <br/>
				<input type = "text" name = "phone"> <br/>
				<input type = "submit" value = "Register" id = "registersubmit">
		</form>
		<br/>
		Already have an account? Login <a href = "index.php"> here </a>
	</body>

</html>