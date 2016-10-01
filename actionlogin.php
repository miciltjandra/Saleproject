<?php
	$user = $_POST["user"];
	$password = $_POST["pass"];

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

	if(strpos($user, '@') === false) {
		$query = "SELECT user_id, password
		FROM user
		WHERE username = '" . $user . "'";
	}
	else {
		$query = "SELECT user_id, password
		FROM user
		WHERE email = '" . $user . "'";
	}

	echo $query . "<br>\n"; 

	$result = $conn->query($query);

	if ($result->num_rows == 0) {
		echo "User not found </br>\n";
		header("Location: index.php?q=error");
	}
	$row = $result->fetch_assoc();

	echo $row["password"] . "<br/>\n";

	if ($row["password"] === $password) {
		echo "Login successful <br/>\n";
		header("Location: catalog.php?id_active=" . $row["user_id"]);
	} else {
		echo "Login error <br/>\n";
		header("Location: index.php?q=error");
	}

	$conn->close();

?>