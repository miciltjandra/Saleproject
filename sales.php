<!DOCTYPE html>
<html>
	<head>
		<title> Sales </title>
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
//				header("Location: index.php");
			}
			else {
				echo "user : " . $user;
				$_SESSION["login"] = "";
			}
		?>		
		<div class="text large"> Here are your sales </div>
		<br><hr>
		<br><br>
		<div class="text">Tanggal</div>
		<hr>	
	</body>
</html>