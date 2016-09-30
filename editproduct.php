<!DOCTYPE html>
<html>
	<head>
		<title> Edit Product </title>
		<link rel="stylesheet" href="style.css">
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
		require 'menubar.php';
		require_once 'menubar.php';
    ?>
	<body class="middle">
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