<!DOCTYPE html>
<html>
	<head>
		<title> Catalog </title>
	</head>
	<body>
		<?php
			session_start();
			$user = $_SESSION["login"];
			if ($user == "") {
				echo "Unlogged";
				header("Location: index.php");
			}
			else {
				echo "user : " . $user;
				$_SESSION["login"] = "";
			}
		?>
	</body>
</html>