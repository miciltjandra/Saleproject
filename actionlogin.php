<?php

	echo $_SERVER['HTTP_REFERER'];


	$username = $_POST["user"];
	$password = $_POST["pass"];

	echo $username . "<br/>\n";
	echo $password . "<br/>\n";

	$servername = "localhost";
	$db_username = "wbd";
	$db_password = "twinbaldchicken";
	$db_database = "saleproject";

	// Create connection
	$conn = new mysqli($servername, $db_username, $db_password, $db_database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else {
		echo "Connected successfully <br>\n";
	}

	$query = "SELECT password
	FROM user
	WHERE username = '" . $username . "'";

	echo $query . "<br>\n"; 

	$result = $conn->query($query);

	if ($result->num_rows == 0) {
		echo "Username not found </br>\n";
	}
	$resultpassword = $result->fetch_assoc();

	echo $resultpassword["password"] . "<br/>\n";

	if ($resultpassword["password"] === $password) {
		echo "Login successful <br/>\n";
		session_start();

		$checkquery = "SELECT user_id
		FROM user
		WHERE username = \"" . $username . "\"";
		$idresult = $conn->query($checkquery);
		$user_id = $idresult->fetch_assoc()["user_id"];
		$_SESSION["login"] = $user_id;
		header("Location: catalog.php");
	} else {
		echo "Login error <br/>\n";
		header("Location: index.php");
		setcookie("login", "error");
	}


?>